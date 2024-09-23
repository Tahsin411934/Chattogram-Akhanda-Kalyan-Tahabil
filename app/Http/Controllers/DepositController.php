<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Deposit;

class DepositController extends Controller
{
    public function create()
    {
        $members = Member::all();
        return view('deposits.create', compact('members'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'member_id' => 'required|exists:members,member_id',
            'deposit_amount' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $member = Member::where('member_id', $request->member_id)->firstOrFail();
        $current_balance = $member->balance + $request->deposit_amount;

        $deposit = new Deposit([
            'member_id' => $request->member_id,
            'deposit_amount' => $request->deposit_amount,
            'current_balance' => $current_balance,
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('deposits', 'public');
            $deposit->image = $imagePath;
        }

        $deposit->save();

        // Update member balance
        $member->update(['balance' => $current_balance]);

        return redirect()->route('deposits.create')->with('success', 'Deposit recorded successfully!');
    }
}
