<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
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

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
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

            // Log the user in
            Auth::login($user);

            return response()->json([
                'success' => true,
                'message' => 'Company application submitted successfully! Redirecting to dashboard...',
                'redirect' => '/dashboard'
            ]);

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
