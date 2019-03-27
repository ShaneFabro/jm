<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Auth;
use App\User;

class AdminPageController extends Controller
{
    public function index()
    {
    $id = Auth::user();
    $users = User::where('id', Auth::user()->id)->get();
    return view('admin.index', compact('users'));
    }
}
