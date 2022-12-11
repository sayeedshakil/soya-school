<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInstitutionDetailsRequest extends FormRequest
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
            'aboutus_title'     => 'required',
            'aboutus_description'     => 'required',
            'aboutus_image'     => 'required|image|mimes:jpeg,jpg,png|max:3072',
            'contactus_school_name'      => 'required',
            'contactus_address'      => 'required',
            'contactus_mobile'      => 'required',
            'contactus_telephone'      => 'nullable',
            'contactus_email'      => 'nullable'
        ];

    }
}
