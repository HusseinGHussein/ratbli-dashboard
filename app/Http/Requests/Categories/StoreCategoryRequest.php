<?php

namespace App\Http\Requests\Categories;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
            'desc' => 'required',
            'desc_en' => 'required',
            'is_offer' => 'required',
            'img' => 'required|image|mimes:jpeg,png,jpg,svg',
            'img_en' => 'required|image|mimes:jpeg,png,jpg,svg',
            'icon' => 'required|image|mimes:jpeg,png,jpg,svg',
        ];
    }
}
