<?php

namespace App\Http\Controllers\Counselor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Submission;

class CounselorAssessedController extends Controller
{
    
    public function index()
    {
        $submissions = Submission::orderBy('created_at', 'asc')->paginate(10);
        return view('counselor.assessed.index')->with('submissions',$submissions);
    }

   

   
}
