<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePasswordResetRequest extends FormRequest
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
            
            "password" => "required | regex:/^[a-zA-Z0-9]+$/ | min:8 | max:20| confirmed",
            "password_confirmation" => "required | regex:/^[a-zA-Z0-9]+$/",
        ];
    }
}
