<?php

namespace App\Http\Controllers\HomeAndAbout;

use App\Models\Skill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

    public function store(Request $request)
    {
        $validate = $request->validate([
            'skill_name' => 'required',
            'percentage' => 'required',
            'color_code' => 'required',
        ]);

        //Boleh guna cara ni kalau takda file upload
        $skill = $request->all();
        Skill::create($skill);

        return redirect()->route('skill.index')->with('success', 'Skill created successfully');
    }

    public function update(Request $request, Skill $skill)
    {
        $validate = $request->validate([
            'skill_name' => 'required',
            'percentage' => 'required',
            'color_code' => 'required',
        ]);

        //Boleh guna cara ni kalau takda file upload
        $skill->update($request->all());

        return redirect()->route('skill.index')->with('success', 'Skill updated successfully');
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();
        return redirect()->route('skill.index')->with('success', 'Skill deleted successfully');
    }
}
