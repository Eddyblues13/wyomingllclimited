<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Company;
use App\Mail\VerificationCodeMail;
use App\Mail\WelcomeMail;
use App\Mail\LoginNotificationMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if ($user && Hash::check($credentials['password'], $user->password)) {
            // Check if user is verified
            if (!$user->is_verified) {
                // Generate a new code
                $code = $user->generateVerificationCode();
                
                // Send email
                Mail::to($user->email)->send(new VerificationCodeMail($user, $code));
                
                return redirect('/verify')->with([
                    'verification_email' => $user->email,
                    'error' => 'Please verify your email to login. We have sent a new code.'
                ]);
            }

            Auth::login($user, $request->boolean('remember'));
            $request->session()->regenerate();

            // Update login tracking
            $user->last_login_at = now();
            $user->last_login_ip = $request->ip();
            $user->save();

            // Send login notification
            Mail::to($user->email)->send(new LoginNotificationMail($user, $request->ip(), $request->userAgent() ?? 'Unknown Device'));

            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function showVerify(Request $request)
    {
        if (!$request->session()->has('verification_email') && !session('verification_email')) {
            return redirect('/login');
        }
        return view('auth.verify');
    }

    public function verify(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'code' => 'required|string|size:4'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->with('error', 'User not found.')->with('verification_email', $request->email);
        }

        if ($user->verification_code !== $request->code) {
            return back()->with('error', 'Invalid verification code.')->with('verification_email', $request->email);
        }

        if ($user->verification_code_expires_at && now()->isAfter($user->verification_code_expires_at)) {
            return back()->with('error', 'Verification code has expired. Please request a new one.')->with('verification_email', $request->email);
        }

        // Verify user
        $user->is_verified = true;
        $user->verification_code = null;
        $user->verification_code_expires_at = null;
        $user->save();

        // Send welcome email
        Mail::to($user->email)->send(new WelcomeMail($user));

        // Log them in
        Auth::login($user);
        
        // Update login tracking
        $user->last_login_at = now();
        $user->last_login_ip = $request->ip();
        $user->save();
        
        // Send login notification
        Mail::to($user->email)->send(new LoginNotificationMail($user, $request->ip(), $request->userAgent() ?? 'Unknown Device'));

        return redirect('/dashboard');
    }

    public function resendCode(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && !$user->is_verified) {
            $code = $user->generateVerificationCode();
            Mail::to($user->email)->send(new VerificationCodeMail($user, $code));
        }

        return back()->with('success', 'A new verification code has been sent.')->with('verification_email', $request->email);
    }

    public function registerCompany(Request $request)
    {
        try {
            $request->validate([
                'entityType' => 'required|string',
                'companyName' => 'required|string|max:255',
                'firstName' => 'required|string|max:255',
                'lastName' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'password' => 'required|string|min:8',
                'formationState' => 'required|string',
            ]);

            // Check if user already exists
            $existingUser = User::where('email', $request->email)->first();
            $isNewUser = false;

            if ($existingUser) {
                // If user exists, check password
                if (!Hash::check($request->password, $existingUser->password)) {
                    return response()->json([
                        'success' => false,
                        'error' => 'An account with this email already exists. Please login or use a different email.'
                    ], 422);
                }
                $user = $existingUser;
            } else {
                // Create new user
                $user = User::create([
                    'name' => $request->firstName . ' ' . $request->lastName,
                    'email' => $request->email,
                    'password' => $request->password,
                    'phone' => $request->phone,
                    'street_address' => $request->streetAddress,
                    'unit_apartment' => $request->unitApartment,
                    'city' => $request->city,
                    'country' => $request->country,
                    'postal_code' => $request->postalCode,
                ]);
                $isNewUser = true;
            }

            // Create the company
            $company = Company::create([
                'user_id' => $user->id,
                'company_name' => $request->companyName,
                'entity_type' => $request->entityType,
                'formation_state' => $request->formationState,
                'business_ending' => $request->businessEnding ?? 'Prefer No Ending',
                'partner_code' => $request->partnerCode,
                'status' => 'pending',
                'state_fee' => 100.00,
            ]);

            if ($isNewUser || !$user->is_verified) {
                // Generate code and send email
                $code = $user->generateVerificationCode();
                Mail::to($user->email)->send(new VerificationCodeMail($user, $code));
                
                // Store email in session for the verify page
                $request->session()->put('verification_email', $user->email);

                return response()->json([
                    'success' => true,
                    'message' => 'Account created! Redirecting to verification...',
                    'redirect' => '/verify'
                ]);
            } else {
                // Log the user in if they are already verified
                Auth::login($user);
                
                // Update login tracking
                $user->last_login_at = now();
                $user->last_login_ip = $request->ip();
                $user->save();
                
                // Send login notification
                Mail::to($user->email)->send(new LoginNotificationMail($user, $request->ip(), $request->userAgent() ?? 'Unknown Device'));

                return response()->json([
                    'success' => true,
                    'message' => 'Company application submitted successfully! Redirecting to dashboard...',
                    'redirect' => '/dashboard'
                ]);
            }

        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'error' => implode(' ', $e->validator->errors()->all())
            ], 422);

        } catch (\Exception $e) {
            Log::error('Company registration failed: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString(),
                'email' => $request->email ?? 'unknown',
            ]);

            return response()->json([
                'success' => false,
                'error' => 'Registration failed: ' . $e->getMessage()
            ], 500);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
