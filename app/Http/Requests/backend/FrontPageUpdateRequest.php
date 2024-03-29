<?php

namespace App\Http\Requests\backend;

use Illuminate\Foundation\Http\FormRequest;

class FrontPageUpdateRequest extends FormRequest
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
        // return [
        //     'headerNameEn' => ['required', 'string'],
        //     'headerNameBn' => ['required', 'string'],
        //     'headTeacherImage' => ['image'],
        //     'headTeacherName' => ['string'],
        //     'latestNewsText' => ['string'],
        //     'is_active' => ['required'],
        //     'published_at' => [''],
        // ];

        return [
            'headerNameEn' => 'required',
            'headerNameBn' => 'required',
            'headTeacherImage' => 'image|mimes:png,jpg,jpeg,gif','max:2048',
            'headTeacherName' => 'required',
            'latestNewsText' => 'string',
            'is_active' => '',
            'published_at' => '',
        ];
    }
}
