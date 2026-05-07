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
}
