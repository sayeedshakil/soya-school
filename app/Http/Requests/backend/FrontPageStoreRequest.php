<?php

namespace App\Http\Requests\backend;

use Illuminate\Foundation\Http\FormRequest;

class FrontPageStoreRequest extends FormRequest
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
