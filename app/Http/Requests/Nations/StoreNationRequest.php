<?php

namespace App\Http\Requests\Nations;

use Illuminate\Foundation\Http\FormRequest;

class StoreNationRequest extends FormRequest
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
            'name' => 'required|min:3|max:50',
            'name_en' => 'required|min:3|max:50',
            'code' => 'required',
            'currency_code' => 'required|max:10',
            'currency_name' => 'required',
            'currency_name_en' => 'required',
            'flag' => 'required|image|mimes:jpeg,png,jpg,svg',
        ];
    }
}
