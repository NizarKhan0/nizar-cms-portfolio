<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Models\Skill;
use App\Models\WorkExperience;
use Illuminate\Http\Request;

class HomePageController extends Controller
{

    public function index()
    {
        $home = Home::all();
        // $skill= Skill::all();
        $skill = Skill::orderBy('percentage', 'desc')->get();
        // $work = WorkExperience::all(); atau boleh guna created_at
        $work = WorkExperience::orderBy('start_date', 'desc')->get();

        return view('index', [
            'homes' => $home,
            'skills' => $skill,
            'works' => $work
        ]);
    }

    public function dashboard()
    {
        $title = 'Profile Statistics';

        return view('backend.dashboard', [
            'title' => $title
        ]);
    }
}
