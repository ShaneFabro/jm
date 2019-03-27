<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use Session;
use Auth;
use App\User;
use Log;
use App\Announcement;

class AdminCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $users = User::where('id', Auth::user()->id)->get();
        $categories = Category::all();
        return view('admin.categories.index', compact('categories', 'users'));
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
        return view('admin.categories.create', compact('users'));
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
            'category_name' => 'required|unique:categories|max:50|regex:/^[\pL\s]+$/u',
        ]);
        
        $first_name = Auth::user()->first_name;
        $last_name = Auth::user()->last_name;
        $message = $first_name . ' ' . $last_name . ' <<CREATED A CATEGORY>> ' . '{' . 'category name:' . $request->category_name .'}';
        Log::info($message);

        Category::create($request->all());
        Session::flash('success', 'You successfully created a category');
        return redirect('/admin/categories');
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
        $category = Category::findorfail($id);
        return view('admin.categories.edit', compact('category', 'users'));
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
            'category_name' => 'required|unique:categories|max:50|regex:/^[\pL\s]+$/u',
        ]);

        $category = Category::findorFail($id);
        $first_name = Auth::user()->first_name;
        $last_name = Auth::user()->last_name;
        $message = $first_name . ' ' . $last_name . ' <<UPDATED A CATEGORY FROM>> ' . '{' . 'category name:' . 
                   $category->category_name .'}'. ' <<TO>> ' . '{' . 'category name:' . $request->category_name . '}' ;
        Log::info($message);
        $category->update($request->all());
        Session::flash('success', 'You successfully updated a category');
        return redirect('/admin/categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findorfail($id);
        $announcement = Announcement::where('category_id', $id)->get()->count();
        for($i = 0; $i < $announcement; $i++){
            $count = Announcement::where('category_id', $id)->first();
            $count->category_id = null;
            $count->update();
        }
        $announcement_trashed = Announcement::withTrashed('category_id', $id)->get()->count();
        for($i = 0; $i < $announcement_trashed; $i++){
            $count = Announcement::withTrashed('category_id', $id)->first();
            $count->category_id = null;
            $count->update();
        }
        $first_name = Auth::user()->first_name;
        $last_name = Auth::user()->last_name;
        $message = $first_name . ' ' . $last_name . ' <<DELETED A CATEGORY>> ' . '{' . 'category name:' . $category->category_name .'}';
        Log::info($message);
        $category->delete();
        Session::flash('success', 'You successfully deleted a category');
       
        return redirect('/admin/categories');
    }

   
}
