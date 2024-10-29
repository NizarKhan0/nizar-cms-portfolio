<?php

namespace App\Http\Controllers\HomeAndAbout;

use App\Models\WorkExperience;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WorkController extends Controller
{

    public function index()
    {
        $title = 'Work Experience CMS';
        $work = WorkExperience::all();

        return view('backend.home_and_about.work.index', [
            'title' => $title,
            'works' => $work
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'position' => 'required',
            'company_name' => 'nullable',
            'location' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
        ]);

        //Boleh guna cara ni kalau takda file upload
        $work = $request->all();
        WorkExperience::create($work);

        // dd($work);

        return redirect()->route('work.index')->with('success', 'Work created successfully');
    }

    public function update(Request $request, WorkExperience $work)
    {
        $validate = $request->validate([
            'position' => 'required',
            'company_name' => 'required',
            'location' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
        ]);

        //Boleh guna cara ni kalau takda file upload
        $work->update($request->all());

        return redirect()->route('work.index')->with('success', 'Work updated successfully');
    }

    public function destroy(WorkExperience $work)
    {
        $work->delete();
        return redirect()->route('work.index')->with('success', 'Work deleted successfully');
    }

}
