<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConfirmProductRequest extends FormRequest
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
            "name" => "required | max:20",
            "product_category" => "required | max:20",
            "product_subcategory" => "required | max:20",
            "image_1" => "required | max:10",
            "image_2" => "required | max:10",
            "image_3" => "required | max:10",
            "image_4" => "required | max:10",
            "product_content" => "required | regex:/^[a-zA-Z0-9]+$/ | min:8 | max:20 | confirmed",
        ];
    }
}
