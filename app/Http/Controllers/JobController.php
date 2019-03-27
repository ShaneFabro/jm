<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Job;
use App\College;
use App\Course;

class JobController extends Controller
{
    public function job()
    {
        $jobs = Job::orderBy('created_at', 'desc')->get();
        $colleges = College::all();
        return view('home.jobs.job', compact('jobs', 'colleges'));
        
    }
    public function jobview($id)
    {
        $jobs = Job::findOrfail($id);
        $jobtitle = Job::findOrfail($id)->job_title;
        $next = Job::where('id', '>' , $jobs->id)->min('id');
        $previous = Job::where('id', '<' , $jobs->id)->max('id');
        $randoms = Job::where('job_title', 'LIKE', $jobtitle)->where('id', '!=', $id)->inRandomOrder()->take(6)->get();
        return view('home.jobs.jobview', compact('jobs', 'randoms','next', 'previous'));
        
    }
    public function searchjob(Request $request)
    {
        $event = $request->input('searchjob');
        // $jobs = Job::where([
        //     ['company', 'like', '%' . request('searchjob') . '%'],
        //     ['job_title', 'like', '%' . request('searchjob') . '%'],
        
        // ])->get();
        $jobs = Job::where('company', 'like', '%' . request('searchjob') . '%')->get();
        $colleges = College::all(); $categories = Category::all();
       
       
        return view('home.jobs.jobssearch', compact('jobs', 'colleges','event', 'category'));
        
    }
}
