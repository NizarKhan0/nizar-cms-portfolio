<?php

namespace App\Http\Controllers\HomeAndAbout;

use App\Models\Education;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

    public function store(Request $request)
    {
        $validate = $request->validate([
            'education_name' => 'required',
            'institution_name' => 'required',
            'location' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
        ]);

        //Boleh guna cara ni kalau takda file upload
        $education = $request->all();
        Education::create($education);

        return redirect()->route('education.index')->with('success', 'Education created successfully');
    }

    public function update(Request $request, Education $education)
    {
        $validate = $request->validate([
            'education_name' => 'required',
            'institution_name' => 'required',
            'location' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
        ]);

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
