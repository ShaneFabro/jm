<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'company', 'job_title', 'job_description','photo_id',
        'course_id','job_qualification', 'job_requirement','contact_person','website','is_open'
    ];

    public function photo(){
        return $this->belongsTo('App\Photo');
     }

     public function course(){
        return $this->belongsTo('App\Course','course_id');
     }
}
