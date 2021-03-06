<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = [
        'category_name'
    ];

    public function announcement() {

        return $this->hasMany('App\Announcement');

    }
}
