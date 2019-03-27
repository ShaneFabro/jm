<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\College;
use App\Course;
use App\User;
use App\Job;
use Session;
use Auth;
use Log;


class AdminCoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $users = User::where('id', Auth::user()->id)->get();
        $courses = Course::all();
        $colleges = College::pluck('college_name', 'id')->all();
        return view('admin.courses.index', compact('courses', 'users', 'colleges'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = Auth::user();
        $users = User::findOrFail($id);
        $colleges = College::pluck('college_name', 'id')->all();
        return view('admin.courses.create', compact('users', 'colleges'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $first_name = Auth::user()->first_name;
        $last_name = Auth::user()->last_name;
        $college_name = College::findOrfail($request->college_id)->college_name;
        $message = $first_name . ' ' . $last_name . ' <<CREATED A COURSE>> ' . '{' . 'course name:' . $request->course_name . ' ' . 
                  'college name:' . $college_name .'}';
        Log::info($message);
        Course::create($request->all());
        Session::flash('success', 'You successfully created a College');
        return redirect('/admin/courses');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $users = User::where('id', Auth::user()->id)->get();
        $course = Course::findorfail($id);
        $colleges = College::pluck('college_name', 'id')->all();
        return view('admin.courses.edit', compact('course', 'users', 'colleges'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $course = Course::findorFail($id);
        $first_name = Auth::user()->first_name;
        $last_name = Auth::user()->last_name;
        $college_name_new = College::findOrfail($request->college_id)->college_name;    
        $message = $first_name . ' ' . $last_name . ' <<UPDATED A COURSE FROM>> ' . '{' . 'course name:' . $course->course_name . ' ' . 
            'college name:' . $course->college->college_name .'}' . ' <<TO>> ' . '{' . 'course name:' . $request->course_name . ' ' . 'college name:' . $college_name_new .'}';
        Log::info($message);
        $course->update($request->all());
        Session::flash('success', 'You successfully updated a course');
        return redirect('/admin/courses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::findorfail($id);
        $job = Job::where('course_id', $id)->get()->count();
        for($i = 0; $i < $job; $i++){
            $count = Job::where('course_id', $id)->first();
            $count->course_id = null;
            $count->update();
        }
        $job = Job::withTrashed('course_id', $id)->get()->count();
        for($i = 0; $i < $job; $i++){
            $count = Job::withTrashed('course_id', $id)->first();
            $count->course_id = null;
            $count->update();
        }
        $first_name = Auth::user()->first_name;
        $last_name = Auth::user()->last_name;
        $message = $first_name . ' ' . $last_name . ' <<DELETED A COURSE>> ' . '{' . 'course name:' . $course->course_name . ' ' . 'college name:' . $course->college->college_name . '}';
        Log::info($message);
        $course->delete();
        Session::flash('success', 'You successfully deleted a course');
        return redirect('/admin/courses');
    }
}
