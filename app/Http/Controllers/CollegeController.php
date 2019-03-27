<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use App\College;
use App\Course;


class CollegeController extends Controller
{
    public function college($id)
    {
        $courses = Course::where('college_id', $id)->get();
        $college_name = College::findOrFail($id)->college_name;
        $colleges = College::all();
        return view('home.colleges.college', compact('courses', 'colleges', 'college_name'));
        
    }
    public function course($id){
        $jobs = Job::where('course_id', $id)->paginate(9);
        $course_name = Course::findOrFail($id)->course_name;
        $colleges = College::all();
        return view('home.colleges.course', compact('colleges', 'jobs', 'course_name'));

    }
}
