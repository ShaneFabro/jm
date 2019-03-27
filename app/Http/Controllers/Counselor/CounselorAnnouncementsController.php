<?php

namespace App\Http\Controllers\Counselor;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AnnouncementsCreateRequest;
use Illuminate\Support\Facades\Session;
use App\Announcement;
use App\Photo;
use App\Category;
use Illuminate\Http\Request;
use App\User;
use Log;



class CounselorAnnouncementsController extends Controller
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
        $announcements = Announcement::orderBy('created_at', 'desc')->paginate(2);
        $categories = Category::pluck('category_name', 'id')->all();
        return view('counselor.announcements.index', compact('announcements', 'users','categories'));
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
        $categories = Category::pluck('category_name', 'id')->all();
        return view('counselor.announcements.create', compact('categories', 'users'));
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
            'title' => 'required|max:75',
            'photo_id' => 'mimes:jpeg,jpg,png|max:4096|nullable',
            // 'body' => 'required|max:500',
            'category_id' => 'required',
        ]);

        $input = $request->all();
        $user = Auth::user();
        if($file = $request->file('photo_id')){
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id; 
        }
        $first_name = Auth::user()->first_name;
        $last_name = Auth::user()->last_name;
        $category_name = Category::findOrfail($request->category_id)->category_name;
        $message = $first_name . ' ' . $last_name . ' <<CREATED A ANNOUNCEMENT>> ' . '{' . 'title:' . $request->title . ' ' . 
                  'body:' . $request->body . ' '. 'category:'. $category_name.'}';
        Log::info($message);

        $user->announcements()->create($input);
        Session::flash('success', 'You successfully created a announcement');
        return redirect('/counselor/announcements');
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
        $idd = Auth::user();
        $users = User::where('id', Auth::user()->idd)->get();
        $announcement = Announcement::findorfail($id);
        $categories = Category::pluck('category_name', 'id')->all();
        return view('counselor.announcements.edit', compact('announcement','categories', 'users'));
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
            'title' => 'required|max:75',
            'photo_id' => 'mimes:jpeg,jpg,png|max:4096|nullable',
            // 'body' => 'required|max:500',
            
        ]);

        $input = $request->all();

        if($file = $request->file('photo_id')){
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id; 
        }
        $announcement = Announcement::findOrfail($id);
       
        if($announcement->category_id == null){
            $category_name = "null";
        }
        else{
            $category_name = Announcement::findorFail($id)->category->category_name;
        }
        $first_name = Auth::user()->first_name;
        $last_name = Auth::user()->last_name;
        $category = Category::findOrFail($request->category_id)->category_name;
        $message = $first_name . ' ' . $last_name . ' <<UPDATED A ANNOUNCEMENT FROM>> ' . '{' . 'title:' . $announcement->title . ' ' . 
                  'body:' . $announcement->body . ' '. 'category:'. $category_name.'}'. ' <<TO>> ' . 
                  '{' . 'title:' . $request->title . ' ' . 'body:' . $request->body . ' '. 'category:'. $category.'}';
        Log::info($message);

        Auth::user()->announcements()->whereId($id)->first()->update($input);
        Session::flash('success', 'You successfully updated a announcement');
        return redirect('/counselor/announcements');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $announcement = Announcement::findorfail($id);
        $first_name = Auth::user()->first_name;
        $last_name = Auth::user()->last_name;
        if($announcement->category_id == null){
            $category_name = "null";
        }
        else{
            $category_name = Announcement::findorFail($id)->category->category_name;
        }
        $message = $first_name . ' ' . $last_name . ' <<TRASHED A ANNOUNCEMENT>> ' . '{' . 'title:' . $announcement->title . ' ' . 
                  'body:' . $announcement->body . ' '. 'category:'. $category_name.'}';
        Log::info($message);
       $announcement->delete();
       Session::flash('success', 'You successfully trashed a announcement');
       return redirect('/counselor/announcements');
    }

    public function trashed(){
        
        $users = User::where('id', Auth::user()->id)->get();
        $announcements = Announcement::onlyTrashed()->get();
     
        return view('counselor.announcements.trashed', compact('announcements', 'users'));
    }

    public function kill($id){
       
        $announcement = Announcement::withTrashed()->where('id', $id)->first();
        $first_name = Auth::user()->first_name;
        $last_name = Auth::user()->last_name;
        if($announcement->category_id == null){
            $category_name = "null";
        }
        else{
            $category_name = $announcement->category->category_name;
        }
        $message = $first_name . ' ' . $last_name . ' <<DELETED A ANNOUNCEMENT>> ' . '{' . 'title:' . $announcement->title . ' ' . 
                  'body:' . $announcement->body . ' '. 'category:'. $category_name.'}';
        Log::info($message);
        unlink(public_path() . $announcement->photo->file);
        $announcement->forceDelete();
        Session::flash('success', 'You successfully deleted a announcement');
        return redirect('/counselor/announcements');
    }

    public function restore($id){
        $announcement = Announcement::withTrashed()->where('id', $id)->first();
        $first_name = Auth::user()->first_name;
        $last_name = Auth::user()->last_name;
        if($announcement->category_id == null){
            $category_name = "null";
        }
        else{
            $category_name = Announcement::findorFail($id)->category->category_name;
        }
        $message = $first_name . ' ' . $last_name . ' <<RESTORED A ANNOUNCEMENT>> ' . '{' . 'title:' . $announcement->title . ' ' . 
                  'body:' . $announcement->body . ' '. 'category:'. $category_name.'}';
        Log::info($message);
        $announcement->restore();
        Session::flash('success', 'You successfully restored a announcement');
        return redirect('/counselor/announcements');
    }

   
}