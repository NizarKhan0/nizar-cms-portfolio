<?php

namespace App\Http\Controllers\HomeAndAbout;

use App\Models\Home;
use Illuminate\Http\Request;
use App\Http\Requests\HomeRequest;
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

    public function store(HomeRequest $request)
    {
        // Validate the request data
        $request->validated();

        // Process the image file
        $image = $request->file('nizar_image');
        $originalName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME); // Get the original file name
        $extension = $image->getClientOriginalExtension(); // Get the file extension
        $imageName = $originalName . '_' . uniqid() . '.' . $extension; // Append unique ID to the original name
        $image->move(public_path('storage/uploads/nizar'), $imageName); // Move file to storage path

        // Create new Home instance and save data
        $home = new Home();
        $home->job_title = $request->job_title;
        $home->intro = $request->intro;
        $home->description = $request->description;
        $home->cta_link = $request->cta_link;
        $home->cta_text = $request->cta_text;
        $home->nizar_image = $imageName;
        $home->save();

        // Redirect back with success message
        return redirect()->route('home.index')->with('success', 'Home created successfully');
    }

    public function update(Home $home, HomeRequest $request)
    {
        // Validate the request data
        $request->validated();

        // Check if a new image has been uploaded
        if ($request->hasFile('nizar_image')) {
            // Delete the old image if it exists
            if ($home->nizar_image) {
                $oldImagePath = public_path('storage/uploads/nizar/' . $home->nizar_image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath); // Delete the old image file
                }
            }

            // Upload the new image
            $image = $request->file('nizar_image');
            $originalName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME); // Get the original file name without extension
            $extension = $image->getClientOriginalExtension(); // Get the file extension
            $imageName = $originalName . '_' . uniqid() . '.' . $extension; // Append unique ID to the original name
            $image->move(public_path('storage/uploads/nizar'), $imageName); // Save the new image

            // Update the image path in the database
            $home->nizar_image = $imageName;
        }

        // Update the other fields
        $home->job_title = $request->job_title;
        $home->intro = $request->intro;
        $home->description = $request->description;
        $home->cta_link = $request->cta_link;
        $home->cta_text = $request->cta_text;
        $home->save(); // Save the changes to the database

        return redirect()->route('home.index')->with('success', 'Home updated successfully');
    }


    public function destroy(Home $home)
    {
        $home->delete();
        return redirect()->route('home.index')->with('success', 'Home deleted successfully');
    }
}
