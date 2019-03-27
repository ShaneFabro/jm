<?php

namespace App\Http\Controllers\Counselor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Auth;
use App\User;

class CounselorPageController extends Controller
{
    public function index()
    {
    $id = Auth::user();
    $users = User::where('id', Auth::user()->id)->get();
    return view('counselor.index', compact('users'));
    }
}
