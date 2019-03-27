<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Announcement extends Model
{

   use SoftDeletes;

   protected $primaryKey = 'id';

    protected $fillable = [
        'title', 'body', 'photo_id','category_id',
    ];

    protected $dates = ['deleted_at'];

    public function user(){
       return $this->belongsTo('App\User', 'user_id');
    }

    public function photo(){
        return $this->belongsTo('App\Photo');
     }

     public function category(){
        return $this->belongsTo('App\Category', 'category_id');
     }
}
