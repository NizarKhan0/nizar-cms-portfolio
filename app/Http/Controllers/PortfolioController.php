<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        $title = 'Portfolio';
        // $portfolio = Portfolio::all();
        $portfolio = Portfolio::with('skills')->get(); // Eager load skills
        $skill = Skill::all();

        // $portfolio = Portfolio::find(2);
        // $portfolio->skills()->attach([1, 2]);
        // $portfolio->load('skills');
        // dd($portfolio);
        // dd($portfolio->skills);

        return view('backend.portfolio.index', [
            'title' => $title,
            'portfolios' => $portfolio,
            'skills' => $skill
        ]);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'project_title' => 'required',
            'project_description' => 'required',
            'project_link' => 'required',
            'project_image_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'skills' => 'array', // Validate that 'skills' is an array of selected skill IDs
        ]);

        //Boleh guna cara ni kalau takda file upload
        // $portfolio = $request->all();
        // Portfolio::create($portfolio);

        $image = $request->file('project_image_path');
        $originalName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME); // Get the original file name without extension
        $extension = $image->getClientOriginalExtension(); // Get the file extension
        $imageName = $originalName . '_' . uniqid() . '.' . $extension; // Append uniqid to the original name
        $image->move(public_path('storage/uploads/projects'), $imageName);


        // Create the new portfolio
        $portfolio = Portfolio::create([
            'project_title' => $request->project_title,
            'project_description' => $request->project_description,
            'project_link' => $request->project_link,
            'project_image_path' => $imageName
        ]);

        // Attach the selected skills to the portfolio
        if ($request->has('skills')) {
            $uniqueSkills = array_unique($request->skills);
            $portfolio->skills()->attach($uniqueSkills);
        }

        return redirect()->route('portfolio.index')->with('success', 'Portfolio created successfully');
    }

    public function update(Request $request, Portfolio $portfolio)
    {
        $validate = $request->validate([
            'project_title' => 'required',
            'project_description' => 'required',
            'project_link' => 'required',
            'project_image_path' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'skills' => 'array', // Validate that 'skills' is an array of selected skill IDs
        ]);

        //Boleh guna cara ni kalau takda file upload
        // $portfolio->update($request->all());

        // Check if a new image has been uploaded
        if ($request->hasFile('project_image_path')) {
            // Delete the old image if it exists
            if ($portfolio->project_image_path) {
                $oldImagePath = public_path('storage/uploads/projects/' . $portfolio->project_image_path);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath); // Delete the old image file
                }
            }

            // Upload the new image
            $image = $request->file('project_image_path');
            $originalName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME); // Get the original file name without extension
            $extension = $image->getClientOriginalExtension(); // Get the file extension
            $imageName = $originalName . '_' . uniqid() . '.' . $extension; // Append uniqid to the original name
            $image->move(public_path('storage/uploads/projects'), $imageName); // Save the new image

            // Update the image path in the database
            $portfolio->project_image_path = $imageName;
        }

        // Update the portfolio
        // $portfolio->update([
        //     'project_title' => $request->project_title,
        //     'project_description' => $request->project_description,
        //     'project_link' => $request->project_link,
        // ]);
        $portfolio->project_title = $request->project_title;
        $portfolio->project_description = $request->project_description;
        $portfolio->project_link = $request->project_link;
        $portfolio->update();

        // Attach the selected skills to the portfolio
        if ($request->has('skills')) {
            $uniqueSkills = array_unique($request->skills);
            $portfolio->skills()->sync($uniqueSkills);
        }

        return redirect()->route('portfolio.index')->with('success', 'Portfolio updated successfully');
    }

    public function destroy(Portfolio $portfolio)
    {
        $portfolio->delete();
        return redirect()->route('portfolio.index')->with('success', 'Portfolio deleted successfully');
    }
}
