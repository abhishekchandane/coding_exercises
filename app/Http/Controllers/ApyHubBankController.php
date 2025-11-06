<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApyHubBankController extends Controller
{
    public function index()
    {
        return view('apyhub-bank');
    }

    public function verify(Request $request)
    {
        $request->validate([
            'ifsc'    => 'required|string|size:11',
            'account' => 'required|string|max:20',
            'name'    => 'required|string|max:100',
        ]);

        try {
            // ✅ Step 1: Validate IFSC using ApyHub
            $ifscResponse = Http::withHeaders([
                'apy-token' => config('services.apyhub.api_key'),
                'Accept'    => 'application/json',
            ])->get('https://api.apyhub.com/validate/banking/ifsc', [
                'ifsc' => strtoupper($request->ifsc),
            ]);

            if (!$ifscResponse->successful()) {
                return back()->with('error', 'Invalid IFSC or ApyHub API issue.');
            }

            $ifscData = $ifscResponse->json();

            // ✅ Step 2: Simulate Bank Account Verification (no real API in ApyHub)
            // You can replace this later with Razorpay or Cashfree penny-drop
            $accountData = [
                'account' => $request->account,
                'ifsc'    => strtoupper($request->ifsc),
                'name'    => $request->name,
                'status'  => 'mock_verified',
                'message' => 'Simulated verification success (ApyHub has no live account API)',
            ];

            $result = [
                'ifsc_verification' => $ifscData,
                'account_verification' => $accountData,
            ];

            return back()->with('result', $result);

        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
