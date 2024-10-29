<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Models\Skill;
use Illuminate\Http\Request;

class HomePageController extends Controller
{

    public function index()
    {
        // Assume you're fetching skills with name and percentage
        $skill= Skill::all();
        // Retrieve skill data from database
        $home = Home::all();
        return view('index', [
            'skills' => $skill,
            'homes' => $home,
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
