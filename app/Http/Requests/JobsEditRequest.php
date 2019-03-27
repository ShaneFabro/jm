<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobsEditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'company' => 'required',
            'website' => 'required',
            'job_title' => 'required',
            'job_description' => 'required',
            'job_qualification' => 'required',
            'job_requirement' => 'required',
            'contact_person' => 'required',
            'photo_id' =>  'nullable',
            'course_id',
            
        ];
    }
}
