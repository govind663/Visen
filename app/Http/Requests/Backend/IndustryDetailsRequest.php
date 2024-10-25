<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class IndustryDetailsRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if ($this->id){
            $rule = [
                'industry_id' => 'required|numeric',
                'categoryName' => 'required|string|max:255',
                'image' => 'mimes:jpeg,jpg,png,gif|max:2048',
                'description' => 'required|string',
            ];
        }else{
            $rule = [
                'industry_id' => 'required|numeric',
                'categoryName' => 'required|string|max:255',
                'image' => 'required|mimes:jpeg,jpg,png,gif|max:2048',
                'description' => 'required|string',
            ];
        }
        return $rule;
    }

    public function messages(){

        return [
            'industry_id.required' => __('Industry Name is required'),
            'industry_id.numeric' => __('Industry Name must be numeric'),

            'categoryName.required' => __('Category Name is required'),
            'categoryName.string' => __('Category Name must be string'),
            'categoryName.max' => __('Category Name must be max 255 character'),

            'image.required' => __('Product Banner Image is required'),
            'image.mimes' => __('Product Banner Image must be jpeg, jpg, png'),
            'image.max' => __('Product Banner Image must be max 2048 kb'),

            'description.required' => __('Product Description is required'),
            'description.string' => __('Product Description must be string'),
        ];

    }
}
