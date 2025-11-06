<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class IfscController extends Controller
{
    public function index()
    {
        return view('ifsc');
    }

    public function verify(Request $request)
    {
        $request->validate([
            'ifsc' => 'required|string|max:11',
        ]);

        $ifsc = strtoupper($request->input('ifsc'));

        $response = Http::get("https://ifsc.razorpay.com/{$ifsc}");

        if ($response->successful()) {
            $data = $response->json();
            return back()->with('success', "✅ IFSC Verified Successfully!")
                         ->with('bank_data', $data);
        } else {
            return back()->with('error', '❌ Invalid IFSC code. Please try again.');
        }
    }
}
