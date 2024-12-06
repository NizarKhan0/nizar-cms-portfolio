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

        $imageName = 'nizar.png'; // Default image

        // Process the image file if uploaded
        if ($request->hasFile('nizar_image')) {
            $image = $request->file('nizar_image');
            $originalName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $image->getClientOriginalExtension();
            $imageName = $originalName . '_' . uniqid() . '.' . $extension;
            $image->move(public_path('storage/uploads/nizar'), $imageName);
        }

        // Create new Home instance and save data
        $home = new Home();
        $home->job_title = $request->job_title;
        $home->intro = $request->intro;
        $home->description = $request->description;
        $home->cta_link = $request->cta_link;
        $home->cta_text = $request->cta_text;
        $home->nizar_image = $imageName;
        $home->save();

        return redirect()->route('home.index')->with('success', 'Home created successfully');
    }


    public function update(Home $home, HomeRequest $request)
    {
        // Validate the request data
        $request->validated();

        // Check if a new image has been uploaded
        if ($request->hasFile('nizar_image')) {
            // Delete the old image if it exists
            if ($home->nizar_image && $home->nizar_image !== 'nizar.png') {
                $oldImagePath = public_path('storage/uploads/nizar/' . $home->nizar_image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            // Upload the new image
            $image = $request->file('nizar_image');
            $originalName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $image->getClientOriginalExtension();
            $imageName = $originalName . '_' . uniqid() . '.' . $extension;
            $image->move(public_path('storage/uploads/nizar'), $imageName);

            $home->nizar_image = $imageName;
        }

        // Update the other fields
        $home->job_title = $request->job_title;
        $home->intro = $request->intro;
        $home->description = $request->description;
        $home->cta_link = $request->cta_link;
        $home->cta_text = $request->cta_text;

        // Save the changes to the database
        $home->save();

        return redirect()->route('home.index')->with('success', 'Home updated successfully');
    }


    public function destroy(Home $home)
    {
        // Check if the image exists and is not the default image
        if ($home->nizar_image && $home->nizar_image !== 'nizar.png') {
            $imagePath = public_path('storage/uploads/nizar/' . $home->nizar_image);
            if (file_exists($imagePath)) {
                unlink($imagePath); // Delete the image file
            }
        }

        // Delete the database record
        $home->delete();

        return redirect()->route('home.index')->with('success', 'Home deleted successfully');
    }

}
