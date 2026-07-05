<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\CryptoDetail;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalCompanies = Company::count();
        $pendingCompanies = Company::where('status', 'pending')->count();
        $approvedCompanies = Company::where('status', 'approved')->count();
        $processingCompanies = Company::where('status', 'processing')->count();
        $rejectedCompanies = Company::where('status', 'rejected')->count();

        $recentUsers = User::latest()->take(5)->get();
        $recentCompanies = Company::with('user')->latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalUsers', 'totalCompanies', 'pendingCompanies',
            'approvedCompanies', 'processingCompanies', 'rejectedCompanies',
            'recentUsers', 'recentCompanies'
        ));
    }

    public function users()
    {
        $users = User::withCount('companies')->latest()->paginate(20);

        return view('admin.users', compact('users'));
    }

    public function viewUser($id)
    {
        $user = User::with('companies')->findOrFail($id);

        return view('admin.user-detail', compact('user'));
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users')->with('success', 'User deleted successfully.');
    }

    public function companies()
    {
        $companies = Company::with('user')->latest()->paginate(20);

        return view('admin.companies', compact('companies'));
    }

    public function updateCompanyStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,processing,approved,rejected',
        ]);

        $company = Company::findOrFail($id);
        $company->update(['status' => $request->status]);

        return redirect()->back()->with('success', "Company status updated to {$request->status}.");
    }

    public function deleteCompany($id)
    {
        $company = Company::findOrFail($id);
        $company->delete();

        return redirect()->route('admin.companies')->with('success', 'Company deleted successfully.');
    }

    public function manageCryptoAssets()
    {
        $users = User::latest()->get();
        $cryptos = CryptoDetail::orderBy('name')->get();

        return view('admin.manage-crypto-assets', compact('users', 'cryptos'));
    }

    public function fundUserBalance(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'symbol' => 'required|string',
            'amount' => 'required|numeric|min:0',
            'action' => 'required|in:set,add,subtract',
        ]);

        $user = User::findOrFail($request->user_id);
        $symbol = strtoupper($request->symbol);
        $amount = (float) $request->amount;
        $balances = $user->crypto_balances ?? [];

        $current = (float) ($balances[$symbol] ?? 0);

        $balances[$symbol] = match ($request->action) {
            'set' => $amount,
            'add' => $current + $amount,
            'subtract' => max(0, $current - $amount),
        };

        $user->crypto_balances = $balances;
        $user->save();

        $actionLabel = match ($request->action) {
            'set' => 'set to',
            'add' => 'increased by',
            'subtract' => 'decreased by',
        };

        return redirect()->back()->with('success', "{$user->name}'s {$symbol} balance {$actionLabel} {$amount}.");
    }

    public function cryptoSettings()
    {
        $cryptos = CryptoDetail::all();

        return view('admin.crypto-settings', compact('cryptos'));
    }

    public function updateCryptoSettings(Request $request)
    {
        $request->validate([
            'addresses' => 'required|array',
            'addresses.*' => 'nullable|string',
        ]);

        foreach ($request->addresses as $id => $address) {
            $crypto = CryptoDetail::findOrFail($id);
            $crypto->update([
                'deposit_address' => trim($address),
            ]);
        }

        return redirect()->back()->with('success', 'Crypto deposit addresses updated successfully.');
    }
}
