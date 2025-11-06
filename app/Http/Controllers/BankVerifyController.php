<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Exception;

class BankVerifyController extends Controller
{
    public function index()
    {
        return view('bank-verify');
    }

    public function verify(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'ifsc' => 'required|string|max:11',
            'account' => 'required|string|max:20',
        ]);

        try {
            $response = Http::withHeaders([
                'X-Client-Id'     => config('services.cashfree.app_id'),
                'X-Client-Secret' => config('services.cashfree.secret_key'),
            ])
            ->post(config('services.cashfree.base_url') . '/api/v1/bank/account/verify', [
                'bankAccount' => $request->account,
                'ifsc'        => strtoupper($request->ifsc),
                'name'        => $request->name,
            ]);

            if ($response->successful()) {
                return back()->with('result', $response->json());
            } else {
                return back()->with('error', $response->body());
            }
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
