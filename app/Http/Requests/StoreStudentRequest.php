<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class StoreStudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //abort_if(Gate::denies('role_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
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
            'address'      => 'nullable',
            'fatherName'      => 'required',
            'motherName'      => 'required',
            'email'         => 'nullable|unique:students,email'
        ];
    }
}
