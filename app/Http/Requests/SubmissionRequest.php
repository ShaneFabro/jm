<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubmissionRequest extends FormRequest
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
            'fname' => 'required|regex:/^[\pL\s]+$/u',
            'mname'=> 'regex:/^[\pL\s]+$/u',
            'lname' => 'required|regex:/^[\pL\s]+$/u',
            'studnum' => 'required|regex:/(20)[0-9]{8}/',
            'course' => 'required',
            'contnum' => 'required|regex:/(09)[0-9]{9}/',
            'emailadd' => 'required',
            'resume' => 'mimes:pdf,docx,doc|required|file|max:1999'
        ];
    }
}
