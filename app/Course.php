<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\College;

class Course extends Model
{
    protected $fillable = [
        'course_name', 'college_id',
    ];

    public function college () {

        return $this->belongsTo('App\College', 'college_id');

    }
}
