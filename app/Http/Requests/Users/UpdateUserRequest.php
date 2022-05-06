<?php

namespace App\Http\Requests\Users;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            //'pic' => 'sometimes',
            'email' => ['required', 'email', 'string'],
            'phone' => ['required'],
            'password' => 'nullable|string|min:8',
            'address' => 'required|string',
            'verified' => 'required',
            'nation_id' => 'required',
            'city_id' => 'required',
        ];
    }
}
