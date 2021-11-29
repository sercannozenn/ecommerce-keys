<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ProductCreateRequest extends FormRequest
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
    public function rules(): array
    {
        $rules = [
            'product_name' => 'required|string|max:255',
            'product_short_description' => 'string',
            'quantity' => 'required|numeric|between:0,300',
            'price' => 'required|numeric|between:0,9999999.99',
            'category_id' => 'required',
            'is_active' => 'required',
            'images.*' => 'required|image|mimes:png,jpeg,jpg|max:2048'
        ];
        if (is_null(request()->product))
        {
            $rules['images'] = 'required';
        }
        return $rules;
    }
}
