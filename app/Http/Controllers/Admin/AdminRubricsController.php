<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\RubricTitle;
use App\RubricCategory;
use Auth;
use App\User;
use App\Rating;
use Session;
use Illuminate\Support\Facades\Log;

class AdminRubricsController extends Controller
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
        $rubrics = RubricCategory::all();
        $userss = User::all();
        $titles = RubricTitle::pluck('name', 'id')->all();
        $ratings = Rating::pluck('name', 'id')->all();
        return view('admin.rubric.index', compact('users', 'userss','rubrics','titles', 'ratings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function createcategory()
    {
        $id = Auth::user();
        $users = User::findOrFail($id);
        $titles = RubricTitle::pluck('name', 'id')->all();
        $ratings = Rating::pluck('name', 'id')->all();
        return view('admin.rubric.createcategory', compact('users','titles', 'ratings'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function storecategory(Request $request)
    {
        $request->validate([
            'name' => 'required|max:75',
        ]);

        RubricCategory::create($request->all());
        $title = RubricTitle::findorFail($request->title_id)->name;
        $rating = Rating::findOrFail($request->rating_id)->name;
        $first_name = Auth::user()->first_name;
        $last_name = Auth::user()->last_name;
        $message = $first_name . ' ' . $last_name . ' <<CREATED A RUBRIC CATEGORY>> ' . '{' . 'rubric title:' . $title . ' ' . 'rubric category:' . $request->name . ' ' . 'rating:' .$rating. '}';
        Log::info($message);
        Session::flash('success', 'You successfully created a Rubric Category');
        return redirect('/admin/rubric');
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
        $rubric = RubricCategory::findorfail($id);
        $titles = RubricTitle::pluck('name', 'id')->all();
        $ratings = Rating::pluck('name', 'id')->all();
        return view('admin.rubric.edit', compact('rubric', 'titles', 'ratings', 'users'));
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
        $rubric = Rubriccategory::findorFail($id);
        $title = RubricTitle::findorFail($rubric->title_id)->name;
        $rating = Rating::findOrFail($rubric->rating_id)->name;
        $title_new = RubricTitle::findorFail($request->title_id)->name;
        $rating_new = Rating::findOrFail($request->rating_id)->name;
        $first_name = Auth::user()->first_name;
        $last_name = Auth::user()->last_name;
        $message = $first_name . ' ' . $last_name . ' <<UPDATED A RUBRIC CATEGORY FROM>> ' . '{' . 'rubric title:' . $title . ' ' 
                   . 'rubric category:' . $rubric->name . ' ' . 'rating:' .$rating. '}'. ' <<TO>> ' . '{' . 'rubric title:' . 
                   $title_new . ' ' . 'rubric category:' . $request->name . ' ' . 'rating:' .$rating_new. '}';
        Log::info($message);
        $rubric->update($request->all());
        Session::flash('success', 'You successfully updated a rubric category');
        return redirect('/admin/rubric');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rubric = Rubriccategory::findorfail($id);
        $title = RubricTitle::findorFail($rubric->title_id)->name;
        $rating = Rating::findOrFail($rubric->rating_id)->name;
        $first_name = Auth::user()->first_name;
        $last_name = Auth::user()->last_name;
        $message = $first_name . ' ' . $last_name . ' <<DELETED A RUBRIC CATEGORY>> ' . '{' . 'rubric title:' . $title . ' ' . 'rubric category:' . $rubric->name . ' ' . 'rating:' .$rating. '}';
        Log::info($message);
        $rubric->delete();
        Session::flash('success', 'You successfully deleted a rubric category');
        return redirect('/admin/rubric');
    }
}
