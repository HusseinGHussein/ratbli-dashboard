<?php

namespace App\Http\Requests\Products;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'image' => 'required',
            'category_id' => 'required|exists:category,id',
            'min_quantity' => 'required|integer|min:1',
            'gender' => ['required', Rule::in([0, 1, 2, 3])],
            'price' => 'required|integer|min:1',
            'express_delivery_time' => 'required_if:is_express,on'
        ];
    }
}
