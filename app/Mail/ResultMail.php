<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ResultMail extends Mailable
{
    use Queueable, SerializesModels;

      public  $contactinfo1; 
      public  $contactinfo2; 
      public  $contactinfo3; 
      public  $education1;
      public  $education2;
      public  $education3;
      public  $experience1;
      public  $experience2;
      public  $experience3;
      public  $involvement1;
      public  $involvement2;
      public  $involvement3;
      public  $visual1;
      public  $visual2;
      public  $visual3;
      public  $organization1; 
      public  $organization2; 
      public  $organization3; 
      public  $grammar1;
      public  $grammar2;
      public  $grammar3;
      public  $title_ContactInfo;
      public  $title_Education;
      public  $title_Experience;
      public  $title_Involvement;
      public  $title_Visual;
      public  $title_Organization;
      public  $title_Grammar;
      public  $contact_info_comment;
      public  $education_comment;
      public  $experience_comment;
      public  $involvement_comment;
      public  $visual_comment;
      public  $organization_comment;
      public  $grammar_comment;
     
    public function __construct($requests)
    {
        $this->contactinfo1 = $requests->contactinfo1; 
        $this->contactinfo2 = $requests->contactinfo2; 
        $this->contactinfo3 = $requests->contactinfo3;;
        $this->education1 = $requests->education1;
        $this->education2 = $requests->education2; 
        $this->education3 = $requests->education3; 
        $this->experience1 = $requests->experience1; 
        $this->experience2 = $requests->experience2; 
        $this->experience3 = $requests->experience3; 
        $this->involvement1 = $requests->involvement1; 
        $this->involvement2 = $requests->involvement2; 
        $this->involvement3 = $requests->involvement3; 
        $this->visual1 = $requests->visual1;
        $this->visual2 = $requests->visual2;
        $this->visual3 = $requests->visual3;
        $this->organization1 = $requests->organization1; 
        $this->organization2 = $requests->organization2; 
        $this->organization3 = $requests->organization3; 
        $this->grammar1 = $requests->grammar1; 
        $this->grammar2 = $requests->grammar2; 
        $this->grammar3 = $requests->grammar3; 
        $this->title_ContactInfo = $requests->title_ContactInfo;
        $this->title_Education = $requests->title_Education;
        $this->title_Experience = $requests->title_Experience;
        $this->title_Involvement = $requests->title_Involvement;
        $this->title_Visual = $requests->title_Visual;
        $this->title_Organization = $requests->title_Organization;
        $this->title_Grammar = $requests->title_Grammar;
        $this->contact_info_comment = $requests->contact_info_comment;
        $this->education_comment = $requests->education_comment;
        $this->experience_comment= $requests->experience_comment;
        $this->involvement_comment = $requests->involvement_comment;
        $this->visual_comment = $requests->visual_comment;
        $this->organization_comment = $requests->organization_comment;
        $this->grammar_comment = $requests->grammar_comment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('testing.ustcareers@gmail.com')
                    ->view('counselor.assessed.email');
    }
}