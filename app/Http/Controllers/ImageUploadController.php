<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageUploadController extends Controller
{
    public function showUploadForm()
    {
        return view('upload');
    }

    public function uploadImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();  

        // Store the image in the public/images directory
        $request->image->move(public_path('abc'), $imageName);

        return back()->with('success', 'Image uploaded successfully.')->with('image', $imageName);
    }
}
