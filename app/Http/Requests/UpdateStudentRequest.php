<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateStudentRequest extends FormRequest
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
            'fName'     => 'required',
            'lName'     => 'required',
            //'image'     => 'nullable|image|mimes:jpeg,jpg,png|max:3072|dimensions:max_width=1080,max_height=675',
            'studentImage'     => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'gender'      => 'required',
            'religion'      => 'required',
            'address'      => 'required',
            'fatherName'      => 'required',
            'motherName'      => 'required',
            'email'=>[
                'email',
                Rule::unique('students')->ignore($this->student)]
        ];
    }
}
