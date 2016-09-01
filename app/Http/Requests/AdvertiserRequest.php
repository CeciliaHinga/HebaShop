<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AdvertiserRequest extends Request
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
        return ['ads_title' => 'required', 'ads_category' => 'required', 'ads_type' => 'required', 'ads_content' => 'required', 'ads_price' => 'required', 'ads_image' => 'required',
        'is_active' => 'boolean',
       'is_featured' => 'boolean',
       'image' => 'required'|'mimes:jpeg,jpg,bmp,png | max:1000',
        ];
    }
}
