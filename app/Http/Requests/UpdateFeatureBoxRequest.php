<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFeatureBoxRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'feature_title'     => 'required',
            'feature_image'     => 'required|image|mimes:jpeg,jpg,png|max:512',
            'feature_subtitle1'      => 'nullable',
            'feature_subtitle2'      => 'nullable',
            'feature_subtitle3'      => 'nullable',
            'feature_subtitle_link1'      => 'nullable',
            'feature_subtitle_link2'      => 'nullable',
            'feature_subtitle_link3'      => 'nullable'
        ];
    }
}
