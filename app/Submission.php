<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;


class Submission extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'summary_id'
    ];

    protected $table = 'submissions';

    protected $dates = ['deleted_at'];
    
    public $primaryKey = 'id';

    public $timestamps = true;

    public function summary() {
        return $this->belongsTo('App\Summary', 'summary_id');
    }
}
