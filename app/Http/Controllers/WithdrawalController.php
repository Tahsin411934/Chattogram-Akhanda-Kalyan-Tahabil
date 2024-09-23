<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Withdrawal;
use Illuminate\Support\Facades\DB;

class WithdrawalController extends Controller
{
    public function create()
    {
        // Fetch all members to populate the dropdown in the view
        $members = Member::all();
        return view('withdrawals.create', compact('members'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'member_id' => 'required|exists:members,member_id',
            'withdraw_amount' => 'required|numeric|min:0',
        ]);

        DB::transaction(function () use ($request) {
            // Find the member by ID
            $member = Member::where('member_id', $request->member_id)->firstOrFail();
            $withdraw_amount = $request->withdraw_amount;

            // Check if the member has sufficient balance
            if ($withdraw_amount > $member->balance) {
                return redirect()->back()->withErrors(['withdraw_amount' => 'Insufficient balance.']);
            }

            $balance_before = $member->balance;
            $balance_after = $balance_before - $withdraw_amount;

            // Create the withdrawal record
            Withdrawal::create([
                'member_id' => $member->member_id,
                'member_name' => $member->member_name,
                'balance_before' => $balance_before,
                'withdraw_amount' => $withdraw_amount,
                'balance_after' => $balance_after,
                'date' => now(),
            ]);

            // Update the member’s balance
            $member->update(['balance' => $balance_after]);
        });

        // Redirect back with a success message
        return redirect()->route('withdrawals.create')->with('success', 'Withdrawal completed successfully!');
    }
}
