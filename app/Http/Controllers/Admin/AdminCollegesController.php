<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\College;
use App\User;
use App\Course;
use Session;
use Auth;
use Log;

class AdminCollegesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $users = User::where('id', Auth::user()->id)->get();
        $colleges = College::all();
        return view('admin.colleges.index', compact('colleges', 'users'));
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
        return view('admin.colleges.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'college_name' => 'required|unique:colleges|max:75|regex:/^[\pL\s]+$/u',
        ]);
        $first_name = Auth::user()->first_name;
        $last_name = Auth::user()->last_name;
        $message = $first_name . ' ' . $last_name . ' <<CREATED A COLLEGE>> ' . '{' . 'college name:' . $request->college_name .'}';
        Log::info($message);

        College::create($request->all());
        Session::flash('success', 'You successfully created a college');
        return redirect('/admin/colleges');
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
        $college = College::findorfail($id);
        return view('admin.colleges.edit', compact('college', 'users'));
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
            'college_name' => 'required|unique:colleges|max:75|regex:/^[\pL\s]+$/u',
        ]);

        $college = College::findorFail($id);
        $first_name = Auth::user()->first_name;
        $last_name = Auth::user()->last_name;
        $message = $first_name . ' ' . $last_name . ' <<UPDATED A COLLEGE FROM>> ' . '{' . 'college name:' . 
                   $college->college_name .'}'. ' <<TO>> ' . '{' . 'college name:' . $request->college_name . '}' ;
        Log::info($message);
        $college->update($request->all());
        Session::flash('success', 'You successfully updated a college');
        return redirect('/admin/colleges');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $college = College::findorfail($id)->first();
        $course = Course::where('college_id', $id)->get()->count();
        for($i = 0; $i < $course; $i++){
                    $count = Course::where('college_id', $id)->first();
                    $count->college_id = null;
                    $count->update();
        }
        $first_name = Auth::user()->first_name;
        $last_name = Auth::user()->last_name;
        $message = $first_name . ' ' . $last_name . ' <<DELETED A COLLEGE>> ' . '{' . 'college name:' . $college->college_name .'}';
        Log::info($message);
        $college->delete();
        Session::flash('success', 'You successfully deleted a college');
        return redirect('/admin/colleges');
    }
}