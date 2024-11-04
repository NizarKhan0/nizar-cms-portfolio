<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Models\Skill;
use App\Models\Contact;
use App\Models\Service;
use App\Models\Education;
use App\Models\Portfolio;
use App\Helpers\EmailHelper;
use Illuminate\Http\Request;
use App\Models\WorkExperience;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class HomePageController extends Controller
{

    public function index()
    {
        $home = Home::all();
        // $skill= Skill::all();
        $skill = Skill::orderBy('percentage', 'desc')->get();
        // $work = WorkExperience::all(); atau boleh guna created_at
        $work = WorkExperience::orderBy('work_start_date', 'desc')->get();
        $education = Education::orderBy('education_start_date', 'desc')->get();
        $portfolio = Portfolio::with('skills')->get();
        $services = Service::all();
        $serviceMainTitle = 'Our Services';
        $contact = Contact::all();

        return view('index', [
            'homes' => $home,
            'skills' => $skill,
            'works' => $work,
            'educations' => $education,
            'portfolios' => $portfolio,
            'services' => $services,
            'serviceMainTitle' => $serviceMainTitle,
            'contacts' => $contact,
        ]);
    }

    public function dashboard()
    {
        $title = 'Profile Statistics';

        $skill = Skill::all();
        $work = WorkExperience::all();
        $education = Education::all();
        $portfolio = Portfolio::all();
        $services = Service::all();


        return view('backend.dashboard', [
            'title' => $title,
            'skills' => $skill,
            'works' => $work,
            'educations' => $education,
            'portfolios' => $portfolio,
            'services' => $services
        ]);
    }

}
