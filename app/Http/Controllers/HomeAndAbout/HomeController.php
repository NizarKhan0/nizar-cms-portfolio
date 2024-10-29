<?php

namespace App\Http\Controllers\HomeAndAbout;

use App\Models\Home;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $title = 'Home CMS';
        $home = Home::all();

        return view('backend.home_and_about.home.index', [
            'title' => $title,
            'homes' => $home
        ]);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'job_title' => 'required',
            'intro' => 'required',
            'description' => 'required',
            'cta_link' => 'required',
            'cta_text' => 'required',
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = $request->file('image_path');
        $originalName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME); // Get the original file name without extension
        $extension = $image->getClientOriginalExtension(); // Get the file extension
        $imageName = $originalName . '_' . uniqid() . '.' . $extension; // Append uniqid to the original name
        $image->move(public_path('storage/uploads/nizar'), $imageName);

        $home = Home::create([
            'job_title' => $request->job_title,
            'intro' => $request->intro,
            'description' => $request->description,
            'cta_link' => $request->cta_link,
            'cta_text' => $request->cta_text,
            'image_path' => $imageName
        ]);

        // dd($home);

        return redirect()->route('home.index')->with('success', 'Home created successfully');
    }

    public function update(Home $home, Request $request)
    {
        $validate = $request->validate([
            'job_title' => 'required',
            'intro' => 'required',
            'description' => 'required',
            'cta_link' => 'required',
            'cta_text' => 'required',
            'image_path' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Check if a new image has been uploaded
        if ($request->hasFile('image_path')) {
            // Delete the old image if it exists
            if ($home->image_path) {
                $oldImagePath = public_path('storage/uploads/nizar/' . $home->image_path);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath); // Delete the old image file
                }
            }

            // Upload the new image
            $image = $request->file('image_path');
            $originalName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME); // Get the original file name without extension
            $extension = $image->getClientOriginalExtension(); // Get the file extension
            $imageName = $originalName . '_' . uniqid() . '.' . $extension; // Append uniqid to the original name
            $image->move(public_path('storage/uploads/nizar'), $imageName); // Save the new image

            // Update the image path in the database
            $home->image_path = $imageName;
        }

        // Update the other fields
        $home->job_title = $request->job_title;
        $home->intro = $request->intro;
        $home->description = $request->description;
        $home->cta_link = $request->cta_link;
        $home->cta_text = $request->cta_text;
        $home->update();
        // $home->save();

        return redirect()->route('home.index')->with('success', 'Home updated successfully');
    }

    public function destroy(Home $home)
    {
        $home->delete();
        return redirect()->route('home.index')->with('success', 'Home deleted successfully');
    }
}
