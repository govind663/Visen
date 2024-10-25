<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
                'filterName' => 'required|string|max:255',
                'productName' => 'required|string|max:255',
                'productCategoryName.*' => 'required|string',
                'status' => 'required|numeric',
            ];
        }else{
            $rule = [
                'industry_id' => 'required|numeric',
                'categoryName' => 'required|string|max:255',
                'filterName' => 'required|string|max:255',
                'productName' => 'required|string|max:255',
                'productCategoryName.*' => 'required|string',
                'status' => 'required|numeric',
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

            'filterName.required' => __('Filter Name is required'),
            'filterName.string' => __('Filter Name must be string'),
            'filterName.max' => __('Filter Name must be max 255 character'),

            'productName.required' => __('Product Name is required'),
            'productName.string' => __('Product Name must be string'),
            'productName.max' => __('Product Name must be max 255 character'),

            'productCategoryName.*.required' => __('Product Category Name is required'),
            'productCategoryName.*.string' => __('Product Category Name must be string'),

            'status.required' => __('Status is required'),
            'status.numeric' => __('Status must be numeric'),

        ];

    }
}
