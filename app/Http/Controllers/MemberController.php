<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Withdrawal;
use App\Models\Deposit;
use App\Models\Nominee;

class MemberController extends Controller
{
    
    public function create()
    {
        $totalMembers = Member::count();
        $largestMemberId = Member::max('id'); // Assuming 'member_id' is the name of the ID column
        return view('member.create', compact('totalMembers', 'largestMemberId'));
    }
    

    // Handle the form submission
    public function store(Request $request)
    {
        // Validate the input
        $request->validate([
            'member_id' => 'required|string|max:255',
            'member_name' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'mother_name' => 'required|string|max:255',
            'spouse_name' => 'nullable|string|max:255',
            'permanent_address' => 'required|string',
            'present_address' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
            'signature' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
            'mobile_number' => 'nullable|string|max:15',
            'email' => 'nullable|email|max:255',
            'date_of_birth' => 'nullable|date',
            'national_id_number' => 'nullable|string|max:255',
            'occupation' => 'nullable|string|max:255',
            'educational_qualification' => 'nullable|string|max:255',
            'akhanda_kalyan_tahabil' => 'nullable|string|max:255',
            'akhanda_mondoli_address' => 'nullable|string|max:255',
            'membership_id' => 'nullable|string|max:255',
        ]);

        // Create a new member
        $data = $request->except(['image', 'signature']);

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
            $data['image'] = 'images/' . $imageName;
        }

        // Handle signature upload
        if ($request->hasFile('signature')) {
            $signature = $request->file('signature');
            $signatureName = time() . '_' . $signature->getClientOriginalName();
            $signature->move(public_path('signatures'), $signatureName);
            $data['signature'] = 'signatures/' . $signatureName;
        }

        Member::create($data);

        return redirect()->route('member.create')->with('success', 'Member added successfully!');
    }

    public function memberInfo(Request $request)
    {
        $members = Member::all();

        $selectedMember = null;
        if ($request->has('member_id')) {
            $selectedMember = Member::with('nominees')->where('member_id', $request->input('member_id'))->first();

            if (!$selectedMember) {
                return redirect()->back()->withErrors(['member_id' => 'Member not found.']);
            }
        }

        return view('memberInfo.showMemberInfo', compact('selectedMember', 'members'));
    }

    public function showDashboard()
{
    $withdrawals = \App\Models\Withdrawal::latest()->take(3)->get();
    $deposits = \App\Models\Deposit::latest()->take(2)->get();

    
    return view('dashboard', compact('withdrawals', 'deposits'));
}

}