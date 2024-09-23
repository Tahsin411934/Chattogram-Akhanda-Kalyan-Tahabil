<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nominee;
use App\Models\Member;

class NomineeController extends Controller
{
    public function create()
    {
        $members = Member::all();
        return view('nominees.create', compact('members'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'member_id' => 'required|exists:members,member_id', // Validate against member_id
            'nominee_name' => 'required|string|max:255',
            'nominee_age' => 'required|integer',
            'nominee_address' => 'required|string',
            'relation_with_member' => 'required|string',
            'get_percentage' => 'required|numeric|min:0|max:100',
            'nominee_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'nominee_signature' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $nominee = new Nominee($request->except(['nominee_image', 'nominee_signature']));

        if ($request->hasFile('nominee_image')) {
            $nomineeImage = $request->file('nominee_image')->store('nominee_images', 'public');
            $nominee->nominee_image = $nomineeImage;
        }

        if ($request->hasFile('nominee_signature')) {
            $nomineeSignature = $request->file('nominee_signature')->store('nominee_signatures', 'public');
            $nominee->nominee_signature = $nomineeSignature;
        }

        $nominee->save();

        return redirect()->route('nominees.create')->with('success', 'Nominee added successfully!');
    }
}
