<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Course;

class College extends Model
{
    protected $fillable = [
        'college_name'
    ];

    public function courses () {

        return $this->hasMany('App\Course','college_id');

    }
}
