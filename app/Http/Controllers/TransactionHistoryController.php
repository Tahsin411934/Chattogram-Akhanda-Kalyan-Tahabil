<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionHistoryController extends Controller
{
    public function dailyTransactionHistory(Request $request)
    {
        // Debugging: Output the request data
        // Uncomment the following line to debug the request
        // dd($request->all());

        // Logic to retrieve transaction history can be added here

        return view('transactionHistory.transactionHistory');
    }
    
}
