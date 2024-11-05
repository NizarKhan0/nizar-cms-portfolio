<?php

namespace App\Http\Controllers\HomeAndAbout;

use App\Models\Skill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SkillRequest;

class SkillController extends Controller
{
    public function index()
    {
        $title = 'Skill CMS';
        $skill = Skill::all();

        return view('backend.home_and_about.skills.index', [
            'title' => $title,
            'skills' => $skill
        ]);
    }

    public function store(SkillRequest $request)
    {
        $request->validated();

        //Boleh guna cara ni kalau takda file upload
        Skill::create($request->all());

        return redirect()->route('skill.index')->with('success', 'Skill created successfully');
    }

    public function update(SkillRequest $request, Skill $skill)
    {
        $request->validated();

        //Boleh guna cara ni kalau takda file upload ($skill tu dari route model binding)
        $skill->update($request->all());

        return redirect()->route('skill.index')->with('success', 'Skill updated successfully');
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();
        return redirect()->route('skill.index')->with('success', 'Skill deleted successfully');
    }
}
