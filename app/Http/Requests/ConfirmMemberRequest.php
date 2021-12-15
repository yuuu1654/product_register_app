<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConfirmMemberRequest extends FormRequest
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
            "name_sei" => "required | max:20",
            "name_mei" => "required | max:20",
            "nickname" => "required | max:10",
            "gender" => "required | integer | in:1,2",
            "password" => "required | regex:/^[a-zA-Z0-9]+$/ | min:8 | max:20 | confirmed",
            "password_confirmation" => "required | regex:/^[a-zA-Z0-9]+$/",
            "email" => "required | email | max:200 | unique:members",
        ];
    }
}
