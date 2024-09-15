<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
class MemberController extends Controller
{
    public function create()
    {
        return view('member.create');
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
         ]);
         // Create a new member
         $data = $request->all();

         // Handle image upload
         if ($request->hasFile('image')) {
             $imagePath = $request->file('image')->store('images', 'public');
             $data['image'] = $imagePath;
         }
 
         // Handle signature upload
         if ($request->hasFile('signature')) {
             $signaturePath = $request->file('signature')->store('signatures', 'public');
             $data['signature'] = $signaturePath;
         }
 
         Member::create($data);
 
         return redirect()->route('member.create')->with('success', 'Member added successfully!');
    }
}
