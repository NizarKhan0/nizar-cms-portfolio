<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Skill;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use App\Http\Requests\PortfolioRequest;

class PortfolioController extends Controller
{
    public function index()
    {
        $title = 'Portfolio CMS';
        // $portfolio = Portfolio::all();
        $portfolio = Portfolio::with('skills')->get(); // Eager load skills
        $skill = Skill::all();

        // $portfolio = Portfolio::find(2);
        // $portfolio->skills()->attach([1, 2]);
        // $portfolio->load('skills');
        // dd($portfolio);
        // dd($portfolio->skills);

        // Prepare an array to hold selected skills for each portfolio
        //Untuk proses update/edit
        $portfolioSkills = $portfolio->map(function ($portfolio) {
            return [
                'portfolio_id' => $portfolio->id,
                'selectedSkills' => $portfolio->skills->pluck('id')->toArray(), // Fetch selected skill IDs for this portfolio
            ];
        });

        return view('backend.portfolio.index', [
            'title' => $title,
            'portfolios' => $portfolio,
            'skills' => $skill,
            'portfolioSkills' => $portfolioSkills, // Pass the selected skills to the view
        ]);
    }

    public function store(PortfolioRequest $request)
    {
        // Validate the request
        $request->validated();

        // Handle file upload for project image
        if ($request->hasFile('project_image')) {
            $image = $request->file('project_image');
            $originalName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME); // Get the original file name without extension
            $extension = $image->getClientOriginalExtension(); // Get the file extension
            $imageName = $originalName . '_' . uniqid() . '.' . $extension; // Append uniqid to the original name
            $image->move(public_path('storage/uploads/projects'), $imageName);
        }

        // Create the new portfolio with the uploaded image name
        $portfolio = new Portfolio();
        $portfolio->project_title = $request->project_title;
        $portfolio->project_description = $request->project_description;
        $portfolio->project_link = $request->project_link;
        $portfolio->project_image = $imageName;
        $portfolio->save();

        // Attach the selected unique skills to the portfolio
        //untuk dapatkan data bila store klau xde, relationship dia pun xde

        // if ($request->has('skills')) {
        //     $uniqueSkills = array_unique($request->skills); // Remove duplicate skill IDs
        //     $portfolio->skills()->attach($uniqueSkills);
        // }
        if ($request->has('skills')) {
            $uniqueSkills = array_unique($request->skills); // Remove duplicate skill IDs

            // Prepare the pivot data with timestamps
            $pivotData = [];
            foreach ($uniqueSkills as $skillId) {
                $pivotData[$skillId] = [
                    'created_at' => now(),  // Set created_at timestamp
                    'updated_at' => now(),  // Set updated_at timestamp
                ];
            }

            // Attach the skills with timestamps to the portfolio
            $portfolio->skills()->attach($pivotData);
        }


        return redirect()->route('portfolio.index')->with('success', 'Portfolio created successfully');
    }


    public function update(PortfolioRequest $request, Portfolio $portfolio)
    {
        $request->validated();

        //Boleh guna cara ni kalau takda file upload
        // $portfolio->update($request->all());

        // Check if a new image has been uploaded
        if ($request->hasFile('project_image')) {
            // Delete the old image if it exists
            if ($portfolio->project_image) {
                $oldImagePath = public_path('storage/uploads/projects/' . $portfolio->project_image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath); // Delete the old image file
                }
            }

            // Upload the new image
            $image = $request->file('project_image');
            $originalName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME); // Get the original file name without extension
            $extension = $image->getClientOriginalExtension(); // Get the file extension
            $imageName = $originalName . '_' . uniqid() . '.' . $extension; // Append uniqid to the original name
            $image->move(public_path('storage/uploads/projects'), $imageName); // Save the new image

            // Update the image path in the database
            $portfolio->project_image = $imageName;
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

        $portfolio->save();

        // Check if features are provided and sync them
        if ($request->has('skills') && is_array($request->skills)) {

            // Remove duplicates from the skills array
            $uniqueSkills = array_unique($request->skills);

            // If the skills array is empty, it will remove all associated skills from the portfolio
            $portfolio->skills()->sync($uniqueSkills);
        } else {
            // If no skills are selected, remove all skills associated with the portfolio (empty the array)
            $portfolio->skills()->sync([]);
        }

        return redirect()->route('portfolio.index')->with('success', 'Portfolio updated successfully');
    }

    public function destroy(Portfolio $portfolio)
    {
        $portfolio->delete();
        return redirect()->route('portfolio.index')->with('success', 'Portfolio deleted successfully');
    }
}
