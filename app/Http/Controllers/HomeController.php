<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Announcement;
use App\Setting;
use App\Job;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $announcements = Announcement::orderBy('created_at', 'desc')->take(1)->get();
        $jobs = Job::orderBy('created_at', 'desc')->take(3)->get();
        $settings = Setting::findOrFail(1)->get()->first();
        return view('home.home', compact('announcements', 'settings','jobs'));
            
    }

    public function submission()
    {
        return view('submission');
    }

   
}