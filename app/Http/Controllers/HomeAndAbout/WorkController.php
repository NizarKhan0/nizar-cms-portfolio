<?php

namespace App\Http\Controllers\HomeAndAbout;

use App\Models\WorkExperience;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\WorkExperienceRequest;

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

    public function store(WorkExperienceRequest $request)
    {
        $request->validated();

        //Boleh guna cara ni kalau takda file upload
        WorkExperience::create($request->all());

        // dd($work);

        return redirect()->route('work.index')->with('success', 'Work created successfully');
    }

    public function update(WorkExperienceRequest $request, WorkExperience $work)
    {
        $request->validated();

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
