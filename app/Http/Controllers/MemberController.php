<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class MemberController extends Controller
{
    public function index()
    {
        // Fetch all members from the database
        $members = Member::all();

        // Pass the data to the view
        return view('members.index', compact('members'));
    }

    public function edit($id)
    {
        $member = Member::findOrFail($id);
        return view('members.edit', compact('member'));
    }

    public function update(Request $request, $id)
    {
        $member = Member::findOrFail($id);
        $member->update($request->all());
        return redirect()->route('members.edit', $id)->with('success', 'Member updated successfully.');
    }


    public function create()
    {
        $totalMembers = Member::count();
        return view('member.create', compact('totalMembers'));
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image upload
            'signature' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate signature upload
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
}
