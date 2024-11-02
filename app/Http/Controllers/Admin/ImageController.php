<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ImageController extends Controller
{


    public function index()
    {
        $images = Image::all(); // Fetch all images from the database
        return view('admin.image.index', compact('images'));
    }

    public function create()
    {
        return view('admin.image.create');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nilai_image' => 'nullable|string',
            'keterangan' => 'nullable|string',
        ]);

        // Save the image file with a unique name
        if ($request->hasFile('path')) {
            $file = $request->file('path');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension(); // Generate a unique filename
            $path = $file->storeAs('image', $filename, 'public'); // Store the image in the 'public/survey' directory

            $validatedData['path'] = $path; // Save the file path to the validated data array
        }

        // Create a new Image record with the validated data
        Image::create($validatedData);

        return redirect()->route('admin.image.index')->with('success', 'Image uploaded successfully!');
    }

    public function destroy($id)
    {
        // Find the image by its ID
        $image = Image::findOrFail($id);

        // Check if the image path exists and delete it from the storage
        if ($image->path && Storage::disk('public')->exists($image->path)) {
            Storage::disk('public')->delete($image->path); // Remove the file from the 'public' disk
        }

        // Now delete the image record from the database
        $image->delete();

        return redirect()->route('admin.image.index')->with('success', 'Image deleted successfully!');
    }
}
