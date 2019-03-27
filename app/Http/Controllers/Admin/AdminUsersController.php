<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\UsersRequest;
use App\Http\Requests\UsersEditRequest;
use Illuminate\Support\Facades\Session;
use App\User;
use App\Role;
use App\Photo;
use Illuminate\Http\Request;
use Auth;
use Hash;
use Log;



class AdminUsersController extends Controller
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
        $userss = User::all();
        $roles = Role::pluck('name', 'id')->all();
        return view('admin.users.index', compact('users', 'userss','roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $roles = Role::pluck('name', 'id')->all();
        return view('admin.users.create', compact('roles', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        if(trim($request->password) == trim($request->password_confirmation)){
            $input = $request->all();
            $input['password'] = bcrypt($request->password);

            if($file = $request->file('photo_id')){

                $name = time() . $file->getClientOriginalName();
                $file->move('images', $name);
                $photo = Photo::create(['file'=>$name]);
                $input['photo_id'] = $photo->id; 
                
            }

            User::create($input);
            $role = Role::findorFail($request->role_id)->name;
            if($request->is_active == 1){
                $active = 'active';
            }
            else{
                $active = 'not active';
            }
            $first_name = Auth::user()->first_name;
            $last_name = Auth::user()->last_name;
            $message = $first_name . ' ' . $last_name . ' <<CREATED A USER>> ' . '{' . 'name:' . $request->first_name .' '. 
                       $request->last_name. ' '.'email:'. $request->email.' ' .'role:'. $role . ' ' . 'is_active:'. 
                       $active . '}';
                    
            Log::info($message);
            Session::flash('success', 'You successfully created a user');
            return redirect('/admin/users');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
        $users = User::findOrFail($idd);
        $user = User::findOrFail($id);
        $roles = Role::pluck('name', 'id')->all();
        return view('admin.users.edit', compact('user', 'roles', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersEditRequest $request, $id)
    {
        $user = User::findOrFail($id);
        // if(Hash::check($request->input('password'), $user->password)){
                $input = $request->all();
                $input['password'] = bcrypt($request->password);

                if($file = $request->file('photo_id')){

                    $name = time() . $file->getClientOriginalName();
                    $file->move('images', $name);
                    $photo = Photo::create(['file'=>$name]);
                    $input['photo_id'] = $photo->id;
                }
                
                $role_new = Role::findorFail($request->role_id)->name;
                if($user->is_active == 1){
                    $activebefore = 'active';
                }
                else{
                    $activebefore = 'not active';
                }
                if($request->is_active == 1){
                    $active = 'active';
                }
                else{
                    $active = 'not active';
                }
                $first_name = Auth::user()->first_name;
                $last_name = Auth::user()->last_name;
                $message = $first_name . ' ' . $last_name . ' <<UPDATED A USER FROM>> ' . '{' . 'name:' . $user->first_name .' '. 
                           $user->last_name. ' '.'email:'. $user->email.' ' .'role:'. $user->role->name . ' ' . 'is_active:'. 
                           $activebefore . '}' . ' <<TO>> ' . '{' . 'name:' . $request->first_name .' '. 
                            $request->last_name. ' '.'email:'. $request->email.' ' .'role:'. $role_new . ' ' . 'is_active:'. 
                            $active . '}';
                Log::info($message);
                $user->update($input);
                Session::flash('success', 'You successfully updated a user');
                return redirect('/admin/users');
        }
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $user = User::findOrFail($id);
        if($user->is_active == 1){
            $active = 'active';
        }
        else{
            $active = 'not active';
        }
        
        
        $first_name = Auth::user()->first_name;
        $last_name = Auth::user()->last_name;
        $message = $first_name . ' ' . $last_name . ' <<TRASHED A USER>> ' . '{' . 'name:' . $user->first_name .' '. 
            $user->last_name. ' '.'email:'. $user->email.' ' .'role:'. $user->role->name . ' ' . 'is_active:'. 
                    $active . '}';
        Log::info($message);
        $user->delete();
        Session::flash('success', 'You successfully trashed a user');
        return redirect('admin/users');
    }
    public function trashed(){
        $id = Auth::user();
        $users = User::where('id', Auth::user()->id)->get();
        $userss = User::onlyTrashed()->get();
        return view('admin.users.trashed', compact('userss', 'users'));
    }

    public function kill($id){
       
        $user = User::withTrashed()->where('id', $id)->first();
        if($user->is_active == 1){
            $active = 'active';
        }
        else{
            $active = 'not active';
        }
        $first_name = Auth::user()->first_name;
        $last_name = Auth::user()->last_name;
        $message = $first_name . ' ' . $last_name . ' <<DELETED A USER>> ' . '{' . 'name:' . $user->first_name .' '. 
            $user->last_name. ' '.'email:'. $user->email.' ' .'role:'. $user->role->name . ' ' . 'is_active:'. 
                    $active . '}';
        Log::info($message);
        unlink(public_path() . $user->photo->file);
        $user->forceDelete();
        Session::flash('success', 'You successfully deleted a announcement');
        return redirect('/admin/users/trashed');
    }

    public function restore($id){
        $user = User::withTrashed()->where('id', $id)->first();
        if($user->is_active == 1){
            $active = 'active';
        }
        else{
            $active = 'not active';
        }
        $first_name = Auth::user()->first_name;
        $last_name = Auth::user()->last_name;
        $message = $first_name . ' ' . $last_name . ' <<RESTORED A USER>> ' . '{' . 'name:' . $user->first_name .' '. 
            $user->last_name. ' '.'email:'. $user->email.' ' .'role:'. $user->role->name . ' ' . 'is_active:'. 
                    $active . '}';
        Log::info($message);
        $user->restore();
        Session::flash('success', 'You successfully restored a announcement');
        return redirect('/admin/users');
    }
}