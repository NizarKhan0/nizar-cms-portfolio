<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeAndAboutController extends Controller
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
        // Create a new instance of the Home model with all request data
        // $home = Home::create($request->all());

        // Validate the request
        $request->validate([
            'job_title' => 'required|string|max:255',
            'intro' => 'required|string',
            'description' => 'required|string',
            'cta_link' => 'nullable|url',
            'cta_text' => 'nullable|string|max:255',
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Max size 2MB
        ]);

        if ($request->hasFile('image_path')) {
            // Get the file
            $image = $request->file('image_path');
            // Create a unique name for the image
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            // Store the image in the public/uploads directory
            $path = $image->storeAs('uploads', $imageName, 'public');
        }

        // Create a new instance of the Home model with all request data
        $home = new Home([
            'job_title' => $request->job_title,
            'intro' => $request->intro,
            'description' => $request->description,
            'cta_link' => $request->cta_link,
            'cta_text' => $request->cta_text,
            'image_path' => $path,
        ]);

        // Save the Home model
        $home->save();

        // Redirect back with a success message
        return redirect()->route('home.index')->with('success', 'Home created successfully.');
    }

    public function update(Home $home, Request $request)
    {
        //Validation
        $validator = Validator::make($request->all(), [
            'job_title' => 'required',
            'intro' => 'required',
            'description' => 'required',
            'cta_link' => 'required',
            'cta_text' => 'required',
            'image_path' => 'required|mimes:png,jpg,jpeg,svg'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->hasFile('image_path')) {
            $image = $request->file('image_path');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);
            $home->image_path = $image_name;
        }

        // Update the Home model, excluding the image_path field to prevent overwriting
        $home->job_title = $request->job_title;
        $home->intro = $request->intro;
        $home->description = $request->description;
        $home->cta_link = $request->cta_link;
        $home->cta_text = $request->cta_text;
        $home->save();

        //Update the Home model tapi tak boleh guna sebab ada image/pdf/etc upload
        // $home->update($request->all());

        return redirect()->route('home.index')->with('success', 'Home updated successfully'); // Use 'success' for session
    }

    public function destroy(Home $home)
    {
        $home->delete();
        return redirect()->route('home.index')->with('success', 'Home deleted successfully');
    }
}
