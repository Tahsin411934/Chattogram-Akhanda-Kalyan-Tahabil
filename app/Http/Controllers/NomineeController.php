<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nominee;
use App\Models\Member;

class NomineeController extends Controller
{
    public function create()
    {
        $members = Member::all(); // Fetch all members
        return view('nominees.create', compact('members'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'member_id' => 'required|exists:members,member_id', // Validate against member_id
            'nominee_name' => 'required|string|max:255',
            'nominee_age' => 'required|integer',
            'nominee_address' => 'required|string',
            'relation_with_member' => 'required|string',
            'get_percentage' => 'required|numeric|min:0|max:100',
            'nominee_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nominee_signature' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Create a new Nominee instance, excluding images
        $nominee = new Nominee($request->except(['nominee_image', 'nominee_signature']));

        // Handle nominee image upload
        if ($request->hasFile('nominee_image')) {
            $nomineeImage = $request->file('nominee_image');
            $nomineeImageName = time() . '_' . $nomineeImage->getClientOriginalName();
            $nomineeImage->move(public_path('nomineeImage'), $nomineeImageName);
            $nominee->nominee_image = 'nomineeImage/' . $nomineeImageName; // Store path directly in nominee
        }

        // Handle nominee signature upload
        if ($request->hasFile('nominee_signature')) {
            $nomineeSignature = $request->file('nominee_signature');
            $nomineeSignatureName = time() . '_' . $nomineeSignature->getClientOriginalName();
            $nomineeSignature->move(public_path('nominee_signatures'), $nomineeSignatureName);
            $nominee->nominee_signature = 'nominee_signatures/' . $nomineeSignatureName; // Store path directly in nominee
        }

        // Save the nominee
        $nominee->save();

        return redirect()->route('nominees.create')->with('success', 'Nominee added successfully!');
    }
    
    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id'); // Adjust 'member_id' to your actual foreign key
    }
}
