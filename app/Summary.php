<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Summary extends Model
{
    protected $fillable = [
            'contact_info_1',
            'contact_info_2',
            'contact_info_3',
            'contact_info_comment',
            'education_1',
            'education_2',
            'education_3',
            'education_comment',
            'experience_1',
            'experience_2',
            'experience_3',
            'experience_comment',
            'involvement_1',
            'involvement_2',
            'involvement_3',
            'involvement_comment',
            'visual_1',
            'visual_2',
            'visual_3',
            'visual_comment',
            'organization_1',
            'organization_2',
            'organization_3',
            'organization_comment',
            'grammar_1',
            'grammar_2',
            'grammar_3',
            'grammar_comment',
    ];

    public function submission() {
        return $this->belongsTo('App\Submission');
    }
}
