<?php

namespace App\Http\Controllers\Counselor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Submission;
use Auth;   
use App\User; 
use App\Summary;
use App\RubricTitle;
use DB;
use Mail;
use App\Mail\ResultMail;
use Log;





class CounselorEvaluationController extends Controller
{
    public function index()
    {
        $id = Auth::user();
        $users = User::where('id', Auth::user()->id)->get();
        $submissions = Submission::orderBy('created_at', 'asc')->paginate(10);
        return view('counselor.evaluation.index',compact('submissions', 'users'));
    }

    public function store(Request $requests)
    {
        $contactinfo1 = json_encode($requests->input('contactinfo1'));
        $contactinfo2 = json_encode($requests->input('contactinfo2'));
        $contactinfo3 = json_encode($requests->input('contactinfo3'));
        $education1 = json_encode($requests->input('education1'));
        $education2 = json_encode($requests->input('education2'));
        $education3 = json_encode($requests->input('education3'));
        $experience1 = json_encode($requests->input('experience1'));
        $experience2 = json_encode($requests->input('experience2'));
        $experience3 = json_encode($requests->input('experience3'));
        $involvement1 = json_encode($requests->input('involvement1'));
        $involvement2= json_encode($requests->input('involvement2'));
        $involvement3 = json_encode($requests->input('involvement3'));
        $visual1 = json_encode($requests->input('visual1'));
        $visual2 = json_encode($requests->input('visual2'));
        $visual3 = json_encode($requests->input('visual3'));
        $organization1 = json_encode($requests->input('organization1'));
        $organization2 = json_encode($requests->input('organization2'));
        $organization3 = json_encode($requests->input('organization3'));
        $grammar1 = json_encode($requests->input('grammar1'));
        $grammar2 = json_encode($requests->input('grammar2'));
        $grammar3 = json_encode($requests->input('grammar3'));

        $summary = Summary::create([
            'contact_info_1'=> $contactinfo1,
            'contact_info_2'=> $contactinfo2,
            'contact_info_3'=> $contactinfo3,
            'contact_info_comment'=> $requests->contact_info_comment,
            'education_1' => $education1,
            'education_2' => $education2,
            'education_3' => $education3,
            'education_comment'=> $requests->education_comment,
            'experience_1' => $experience1,
            'experience_2' => $experience2,
            'experience_3' => $experience3,
            'experience_comment'=> $requests->experience_comment,
            'involvement_1' => $involvement1,
            'involvement_2' => $involvement2,
            'involvement_3' => $involvement3,
            'involvement_comment'=> $requests->involvement_comment,
            'visual_1' => $visual1,
            'visual_2' => $visual2,
            'visual_3' => $visual3,
            'visual_comment'=> $requests->visual_comment,
            'organization_1' => $organization1,
            'organization_2' => $organization2,
            'organization_3' => $organization3,
            'organization_comment'=> $requests->organization_comment,
            'grammar_1' => $grammar1,
            'grammar_2' => $grammar2,
            'grammar_3' => $grammar3,
            'grammar_comment'=> $requests->grammar_comment,
        ]);
        $submission = Submission::findorfail($requests->submissionid);
        $submission->summary_id = $input['summary_id'] = $summary->id;
        $submission->update($input);
        $first_name = Auth::user()->first_name;
        $last_name = Auth::user()->last_name;
        $message = $first_name . ' ' . $last_name . ' <<EVALUATED A RESUME FROM>> ' . '{' . 'name:' . $submission->fname . ' ' . 
                  $submission->lname . ' '. 'student_number:'. $submission->studnum. ' '. 'course:' . $submission->course. ' '. 
                  'contact_number:' . $submission->contnum. ' '. 'email:'. $submission->emailadd. '}';
        Log::info($message);
        Mail::to($requests->input('email'))->send( new ResultMail($requests));
        $submission->delete();
        return redirect('/counselor/evaluation');
    }

    public function evaluate($id)
    {
        $users = User::where('id', Auth::user()->id)->get();
        $submission = Submission::findOrFail($id)->resume;
        $submissionid = Submission::findOrFail($id)->id;
        $email = Submission::findOrFail($id)->emailadd;
        $count = RubricTitle::count();
        $categories = DB::table('rubric_categories')->get()->toJson();
        $decode_cats = json_decode($categories);
        $titles = DB::table('rubric_titles')->get()->toJson();
        $decode_titles = json_decode($titles);
        $ratings = DB::table('ratings')->get()->toJson();
        $decode_ratings = json_decode($ratings);
        $title_ContactInfo = RubricTitle::findOrfail(1);
        $title_Education = RubricTitle::findOrfail(2);
        $title_Experience = RubricTitle::findOrfail(3);
        $title_Involvement = RubricTitle::findOrfail(4);
        $title_Visual = RubricTitle::findOrfail(5);
        $title_Organization = RubricTitle::findOrfail(6);
        $title_Grammar = RubricTitle::findOrfail(7);
    
        return view('counselor.evaluation.evaluate', ['id'=> $id],compact('submission','count'
                    , 'titles', 'decode_titles', 'decode_cats','decode_ratings','title_ContactInfo', 'title_Education',
                'title_Experience', 'title_Involvement', 'title_Visual', 'title_Organization', 'title_Grammar','email','submissionid','users'));
    }
    public function assessed(){
        $users = User::where('id', Auth::user()->id)->get();
        $submissions = Submission::onlyTrashed()->get();
        return view('counselor.assessed.index', compact('submissions','users'));

    }
    public function summary($id){
        $summary = Summary::findOrFail($id);
        $contact1 = trim($summary->contact_info_1, '[]"');
        $contact2 = trim($summary->contact_info_2, '[]"');
        $contact3 = trim($summary->contact_info_3, '[]"');
        $contact_comment = $summary->contact_info_comment;
        $educ1 = trim($summary->education_1, '[]"');
        $educ2 = trim($summary->education_1, '[]"');
        $educ3 = trim($summary->education_1, '[]"');
        $educ_comment = $summary->education_comment;
        $experience1 = trim($summary->experience_1, '[]"');
        $experience2 = trim($summary->experience_2, '[]"');
        $experience3 = trim($summary->experience_3, '[]"');
        $experience_comment = $summary->experience_comment;
        $involvement1 = trim($summary->involvement_1, '[]"');
        $involvement2 = trim($summary->involvement_2, '[]"');
        $involvement3 = trim($summary->involvement_3, '[]"');
        $involvement_comment = $summary->involvement_comment;
        $visual1 = trim($summary->visual_1, '[]"');
        $visual2 = trim($summary->visual_2, '[]"');
        $visual3 = trim($summary->visual_3, '[]"');
        $visual_comment = $summary->visual_comment;
        $organization1 = trim($summary->organization_1, '[]"');
        $organization2 = trim($summary->organization_2, '[]"');
        $organization3 = trim($summary->organization_3, '[]"');
        $organization_comment = $summary->organization_comment;
        $grammar1 = trim($summary->grammar_1, '[]"');
        $grammar2 = trim($summary->grammar_2, '[]"');
        $grammar3 = trim($summary->grammar_3, '[]"');
        $grammar_comment = $summary->grammar_comment;
        return view('counselor.assessed.summary', compact('contact1','contact2','contact3','contact_comment','educ1','educ2','educ3','educ_comment','experience1',
                    'experience2', 'experience3', 'experience_comment','involvement1', 'involvement2', 'involvement3', 'involvement_comment','visual1', 'visual2',
                    'visual3', 'visual_comment', 'organization1', 'organization2', 'organization3', 'organization_comment', 'grammar1', 'grammar2', 'grammar3',
                    'grammar_comment'));
    }
    public function kill($id){
        $submission = Submission::withTrashed()->where('id', $id)->first();
        $first_name = Auth::user()->first_name;
        $last_name = Auth::user()->last_name;
        $message = $first_name . ' ' . $last_name . ' <<DELETED A RESUME>> ' . '{' . 'name:' . $submission->fname . ' ' . 
                  $submission->lname . ' '. 'student_number:'. $submission->studnum. ' '. 'course:' . $submission->course. ' '. 
                  'contact_number:' . $submission->contnum. ' '. 'email:'. $submission->emailadd. '}';
        Log::info($message);
        $submission->forceDelete();
        return redirect('/counselor/assessed/');

    }
}