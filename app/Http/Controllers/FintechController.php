<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Exception;

class FintechController extends Controller
{
    public function index()
    {
        return view('fintech.dashboard');
    }

    public function verifyWithSetu(Request $request)
    {
        $request->validate([
            'ifsc'       => 'required|string|size:11',
            'account'    => 'required|digits_between:9,20',
        ]);

        $baseUrl = config('services.setu.base_url');
        $clientId = config('services.setu.client_id');
        $clientSecret = config('services.setu.client_secret');
        $prodInstId = config('services.setu.product_instance_id');

        try {
            $response = Http::withHeaders([
                'x-client-id'          => $clientId,
                'x-client-secret'      => $clientSecret,
                'x-product-instance-id'=> $prodInstId,
                'accept'               => 'application/json',
                'content-type'         => 'application/json',
            ])->post("{$baseUrl}/api/payout/v2/bankAccounts/sync", [
                'ifsc'          => strtoupper($request->ifsc),
                'accountNumber' => $request->account,
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
