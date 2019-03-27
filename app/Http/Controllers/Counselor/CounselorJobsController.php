<?php

namespace App\Http\Controllers\Counselor;
use App\Http\Controllers\Controller;
use App\Http\Requests\JobsCreateRequest;
use Illuminate\Http\Request;
use App\Job;
use App\Photo;
use App\College;
use Session;
use App\User;
use Auth;
use App\Course;
use Log;

class CounselorJobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user();
        $users = User::where('id', Auth::user()->id)->get();
        $jobs = Job::all();
        $colleges = College::all();
        $courses = Course::all();
        return view('counselor.jobs.index', compact('jobs', 'users', 'colleges', 'courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = Auth::user();
        $users = User::where('id', Auth::user()->id)->get();
        $colleges = College::all();
        $courses = Course::all();
        return view('counselor.jobs.create', compact('colleges', 'users','courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JobsCreateRequest $request)
    {
        
        $request->validate([
            'company' => 'required|max:75',
            'photo_id' => 'mimes:jpeg,jpg,png|max:4096|nullable',
            // 'job_description' => 'required|max:500',
            'job_title'=> 'required|max:75',
        ]);

        $input = $request->all();

        if($file = $request->file('photo_id')){

            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id; 
            
        }
        if($request->is_open == 1){
            $open = 'application is open';
        }
        else{
            $open = 'application is closed';
        }
        
        $first_name = Auth::user()->first_name;
        $last_name = Auth::user()->last_name;
        $trim_job_description = strip_tags($request->job_description);
        $trim_job_qualification = strip_tags($request->job_qualification);
        $trim_job_requirement = strip_tags($request->job_requirement);
        $trim_contact_person = strip_tags($request->contact_person);
        $course = Course::findOrFail($request->course_id)->course_name;
        
        $message = $first_name . ' ' . $last_name . ' <<CREATED A JOB LIST>> ' . '{' . 'company:' . $request->company . ' ' . 
                  'website:' . $request->website . ' '. 'is_open:'. $open. ' '. 'job_title:'. $request->job_title. ' ' . 'job_description:'.
                  $trim_job_description. ' '. 'job_qualification:' . $trim_job_qualification. ' '. 'job_requirement:'. $trim_job_requirement . 
                  ' '. 'contact_person'.  $trim_contact_person . ' '. 'course:'.$course .'}';
        Log::info($message);
        Job::create($input);
        Session::flash('success', 'You successfully created a job');
        return redirect('/counselor/jobs');
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
        $job = Job::findOrFail($id);
        $colleges = College::all();
        $courses = Course::all();
        return view('counselor.jobs.edit', compact('job', 'colleges', 'users','courses'));
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
        $request->validate([
            'company' => 'required|max:75',
            'photo_id' => 'mimes:jpeg,jpg,png|max:4096|nullable',
            'job_description' => 'required|max:500',
            'job_title'=> 'required|max:75',
            'job_description' => 'required',
            'job_qualification' => 'required',
            'job_requirement' => 'required',
            'contact_person' => 'required',
            'photo_id' =>  'nullable',
            'course_id',
        ]);

        $input = $request->all();

        if($file = $request->file('photo_id')){
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id; 
        }
        $job = Job::findorFail($id);
            if($job->course_id == null){
                $course_name = "null";
            }
            else{
                $course_name = Job::findorFail($id)->course->course_name;
            }
            if($job->is_open == 1){
            $open = 'application is open';
                }
            else{
            $open = 'application is closed';
                }
             if($request->is_open == 1){
            $open_new = 'application is open';
                }
            else{
            $open_new = 'application is closed';
                }
            
            $first_name = Auth::user()->first_name;
            $last_name = Auth::user()->last_name;
            $trim_job_description = strip_tags($job->job_description);
            $trim_job_qualification = strip_tags($job->job_qualification);
            $trim_job_requirement = strip_tags($job->job_requirement);
            $trim_contact_person = strip_tags($job->contact_person);
            $trim_job_description_new = strip_tags($request->job_description);
            $trim_job_qualification_new = strip_tags($request->job_qualification);
            $trim_job_requirement_new = strip_tags($request->job_requirement);
            $trim_contact_person_new = strip_tags($request->contact_person);
            $course = Course::findOrFail($request->course_id)->course_name;
            $message = $first_name . ' ' . $last_name . ' <<UPDATED A JOB LIST FROM>> ' . '{' . 'company:' . $job->company . ' ' . 
                      'website:' . $job->website . ' '. 'is_open:'. $open. ' '. 'job_title:'. $job->job_title. ' ' . 'job_description:'.
                      $trim_job_description. ' '. 'job_qualification:' . $trim_job_qualification. ' '. 'job_requirement:'. $trim_job_requirement . 
                      ' '. 'contact_person'.  $trim_contact_person . ' '. 'course:'.$course_name .'}'. ' <<TO>> ' . 
                      '{' . 'company:' . $request->company . ' ' . 'website:' . $request->website . ' '. 'is_open:'. $open_new. ' '. 'job_title:'. $request->job_title. 
                      ' ' . 'job_description:'. $trim_job_description_new. ' '. 'job_qualification:' . $trim_job_qualification_new. ' '. 'job_requirement:'.
                      $trim_job_requirement_new . ' '. 'contact_person'.  $trim_contact_person_new . ' '. 'course:'.$course .'}';
            Log::info($message);
            $job->whereId($id)->first()->update($input);
            
        Session::flash('success', 'You successfully updated a job');  
        return redirect('/counselor/jobs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $job = Job::findorfail($id);
       if($job->is_open == 1){
        $open = 'application is open';
            }
        else{
        $open = 'application is closed';
            }
        if($job->course_id == null){
            $course_name = "null";
        }
        else{
            $course_name = $job->course->course_name;
        }
        $first_name = Auth::user()->first_name;
        $last_name = Auth::user()->last_name;
        $trim_job_description = strip_tags($job->job_description);
        $trim_job_qualification = strip_tags($job->job_qualification);
        $trim_job_requirement = strip_tags($job->job_requirement);
        $trim_contact_person = strip_tags($job->contact_person);
        
        
        $message = $first_name . ' ' . $last_name . ' <<TRASHED A JOB LIST>> ' . '{' . 'company:' . $job->company . ' ' . 
                  'website:' . $job->website . ' '. 'is_open:'. $open. ' '. 'job_title:'. $job->job_title. ' ' . 'job_description:'.
                  $trim_job_description. ' '. 'job_qualification:' . $trim_job_qualification. ' '. 'job_requirement:'. $trim_job_requirement . 
                  ' '. 'contact_person'.  $trim_contact_person . ' '. 'course:'. $course_name .'}';
        Log::info($message);
       $job->delete();
       Session::flash('success', 'You successfully deleted a job');
       return redirect('/counselor/jobs');
    }
    public function trashed(){
        
        $users = User::where('id', Auth::user()->id)->get();
        $jobs = Job::onlyTrashed()->get();
        return view('counselor.jobs.trashed', compact('jobs', 'users'));
    }
    public function kill($id){
       
        $job = Job::withTrashed()->where('id', $id)->first();
            if($job->is_open == 1){
            $open = 'application is open';
                }
            else{
            $open = 'application is closed';
                }
            if($job->course_id == null){
                $course_name = "null";
            }
            else{
                $course_name = $job->course->course_name;
            }
            $first_name = Auth::user()->first_name;
            $last_name = Auth::user()->last_name;
            $trim_job_description = strip_tags($job->job_description);
            $trim_job_qualification = strip_tags($job->job_qualification);
            $trim_job_requirement = strip_tags($job->job_requirement);
            $trim_contact_person = strip_tags($job->contact_person);
            
            $message = $first_name . ' ' . $last_name . ' <<DELETED A JOB LIST>> ' . '{' . 'company:' . $job->company . ' ' . 
                      'website:' . $job->website . ' '. 'is_open:'. $open. ' '. 'job_title:'. $job->job_title. ' ' . 'job_description:'.
                      $trim_job_description. ' '. 'job_qualification:' . $trim_job_qualification. ' '. 'job_requirement:'. $trim_job_requirement . 
                      ' '. 'contact_person'.  $trim_contact_person . ' '. 'course:'.$course_name .'}';
            Log::info($message);
        unlink(public_path() . $job->photo->file);
        $job->forceDelete();
        Session::flash('success', 'You successfully deleted a job');
        return redirect('/counselor/jobs/trashed');
    }
    public function restore($id){
    $job = Job::withTrashed()->where('id', $id)->first();
    ;
        if($job->is_open == 1){
        $open = 'application is open';
            }
        else{
        $open = 'application is closed';
            }
        if($job->course_id == null){
            $course_name = "null";
        }
        else{
            $course_name = $job->course->course_name;
        }
        $first_name = Auth::user()->first_name;
        $last_name = Auth::user()->last_name;
        $trim_job_description = strip_tags($job->job_description);
        $trim_job_qualification = strip_tags($job->job_qualification);
        $trim_job_requirement = strip_tags($job->job_requirement);
        $trim_contact_person = strip_tags($job->contact_person);
        $message = $first_name . ' ' . $last_name . ' <<RESTORED A JOB LIST>> ' . '{' . 'company:' . $job->company . ' ' . 
                    'website:' . $job->website . ' '. 'is_open:'. $open. ' '. 'job_title:'. $job->job_title. ' ' . 'job_description:'.
                    $trim_job_description. ' '. 'job_qualification:' . $trim_job_qualification. ' '. 'job_requirement:'. $trim_job_requirement . 
                    ' '. 'contact_person'.  $trim_contact_person . ' '. 'course:'. $course_name .'}';
        Log::info($message);
        $job->restore();
        Session::flash('success', 'You successfully restored a job');
        return redirect('/counselor/jobs');
    }

}