<?php

namespace App\Http\Controllers;

use App\Models\Deposit; 
use App\Models\Withdrawal; 
use Illuminate\Http\Request;

class ReceiptController extends Controller
{
    public function create(Request $request)
    {
        $deposit = null;
        if ($request->has('id')) {
            $deposit = Deposit::with('member')->find($request->input('id'));
        }
        return view('receipt.create', compact('deposit'));
    }
    public function withdrawal(Request $request)
    {
        $withdraw = null;
        if ($request->has('id')) {
            
            $withdraw = Withdrawal::with('member')->find($request->input('id'));
        }
        return view('receipt.withdrawal', compact('withdraw'));
    }
}

