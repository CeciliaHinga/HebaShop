<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EditAdvertRequest extends Request
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
         return ['ads_title' =>  'alpha_dash | required | unique:category_types', 'category_id' => 'required', 'type_id' => 'required', 'ads_content' => 'required', 'ads_price' => 'required | min:3', 'ads_image' =>  'alpha_num | required | unique:category_types',
       //  'is_active' => 'boolean',
       // 'is_featured' => 'boolean',
       'image' => 'required| mimes:jpeg,jpg,png | max:2000',
        ];
    }
}
