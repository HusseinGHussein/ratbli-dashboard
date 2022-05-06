<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'user_name' => 'required|string|min:3|max:255',
            'pic' => 'required',
            'email' => 'required|string|email|unique:users',
            'phone' => 'required|unique:users',
            'password' => 'required|string|min:8',
            'address' => 'required|string',
            'verified' => 'required',
            'nation_id' => 'required',
            'city_id' => 'required',
        ];
    }
}
