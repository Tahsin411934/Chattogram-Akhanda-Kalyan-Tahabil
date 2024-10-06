<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionHistoryController extends Controller
{

    
    public function fetchTransactionsByDate(Request $request)
    {
       
        $date = $request->input('date', date('Y-m-d'));

        
        $deposits = DB::table('deposits')
            ->select(
                'id as transaction_id',
                'member_id',
                'deposit_amount as amount',
                'current_balance as current_balance',
                'created_at',
                DB::raw("'deposit' as transaction_type") // Add a transaction type
            )
            ->whereDate('created_at', '=', $date);
        
        $withdrawals = DB::table('withdrawals')
            ->select(
                'id as transaction_id',
                'member_id',
                'withdraw_amount as amount',
                'balance_after as current_balance',
                'date as created_at',
                DB::raw("'withdrawal' as transaction_type") // Add a transaction type
            )
            ->whereDate('date', '=', $date);

        // Combine both queries using union
        $transactions = $deposits->union($withdrawals)
            ->orderBy('created_at', 'desc') // Sort by created_at
            ->get();

        // Return the result, passing it to a view
        return view('transactionHistory.transactionHistory', ['transactions' => $transactions]);
    }



    public function fetchMonthlyTransactions(Request $request)
    {
    
        $month = $request->input('month', date('m')); // Default to current month
        $year = $request->input('year', date('Y')); // Default to current year

        
        $deposits = DB::table('deposits')
            ->select(
                'id as transaction_id',
                'member_id',
                'deposit_amount as amount',
                'current_balance as current_balance',
                'created_at',
                DB::raw("'deposit' as transaction_type") // Add a transaction type
            )
            ->whereMonth('created_at', '=', $month)
            ->whereYear('created_at', '=', $year);
        
        $withdrawals = DB::table('withdrawals')
            ->select(
                'id as transaction_id',
                'member_id',
                'withdraw_amount as amount',
                'balance_after as current_balance',
                'date as created_at',
                DB::raw("'withdrawal' as transaction_type") // Add a transaction type
            )
            ->whereMonth('date', '=', $month)
            ->whereYear('date', '=', $year);

        // Combine both queries using union
        $transactions = $deposits->union($withdrawals)
            ->orderBy('created_at', 'desc') // Sort by created_at
            ->get();

        // Return the result, passing it to a view
        return view('transactionHistory.monthlyTransactionHistory', [
            'transactions' => $transactions,
            'selectedMonth' => $month,
            'selectedYear' => $year,
        ]);
    }


    public function fetchTransactionsByMember(Request $request)
    {
        // Retrieve the member ID from the input
        $memberId = $request->input('member_id');

        // Fetch data from both deposits and withdrawals for the selected member
        $deposits = DB::table('deposits')
            ->select(
                'id as transaction_id',
                'member_id',
                'deposit_amount as amount',
                'current_balance',
                'created_at',
                DB::raw("'deposit' as transaction_type")
            )
            ->where('member_id', '=', $memberId);

        $withdrawals = DB::table('withdrawals')
            ->select(
                'id as transaction_id',
                'member_id',
                'withdraw_amount as amount',
                'balance_after as current_balance',
                'date as created_at',
                DB::raw("'withdrawal' as transaction_type")
            )
            ->where('member_id', '=', $memberId);

        // Combine both queries using union
        $transactions = $deposits->union($withdrawals)
            ->orderBy('created_at', 'desc') // Sort by created_at
            ->get();

        // Fetch all members to populate the dropdown
        $members = DB::table('members')->get();

        // Return the result, passing it to a view
        return view('transactionHistory.memberTransactionHistory', [
            'transactions' => $transactions,
            'members' => $members
        ]);
    }
}
