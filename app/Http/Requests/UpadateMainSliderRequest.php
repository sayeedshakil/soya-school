<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpadateMainSliderRequest extends FormRequest
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
            'sliderImage' => 'image|mimes:png,jpg,jpeg,gif|dimensions:width=1320,height=460'
        ];
    }
}
