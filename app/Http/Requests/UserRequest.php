<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required|max:20',
            'family' => 'required|max:20',
            'fullName' => '',
            'phoneNumber' => 'required',
            'role_id' => 'required',
            'email' => 'required|unique:users|max:200|email',
            'avatar' => '',
            'password' => 'required',
        ];
    }
}
