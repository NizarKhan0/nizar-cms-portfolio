<?php

namespace App\Http\Controllers\HomeAndAbout;

use App\Models\Education;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EducationRequest;

class EducationController extends Controller
{
    public function index()
    {
        $title = 'Education CMS';
        $education = Education::all();

        return view('backend.home_and_about.edu.index', [
            'title' => $title,
            'educations' => $education
        ]);
    }

    public function store(EducationRequest $request)
    {
        $request->validated();

        //Boleh guna cara ni kalau takda file upload
        // $education = $request->all();
        // Education::create($education);

        Education::create($request->all());

        return redirect()->route('education.index')->with('success', 'Education created successfully');
    }

    public function update(EducationRequest $request, Education $education)
    {
        $request->validated();

        //Boleh guna cara ni kalau takda file upload
        $education->update($request->all());

        return redirect()->route('education.index')->with('success', 'Education updated successfully');
    }

    public function destroy(Education $Education)
    {
        $Education->delete();
        return redirect()->route('education.index')->with('success', 'Education deleted successfully');
    }
}
