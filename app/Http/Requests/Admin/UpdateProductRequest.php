<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
           'name'=>'required|string|max:255',
           
            'description'=>'required|string',
            'price' => 'required|numeric|min:0.01|max:9999.99',
            'image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id'=>'exists:categories,id'
        ];
    }
}
