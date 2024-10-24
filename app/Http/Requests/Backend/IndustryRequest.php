<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class IndustryRequest extends FormRequest
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
                'industries_image' => 'image|mimes:jpeg,png,jpg|max:2048',
                'industries_name' => 'required|string|max:255',
                'description' => 'required|string',
                'industry_category.*' => 'required|string',
                'status' => 'required|numeric',
            ];
        }else{
            $rule = [
                'industries_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'industries_name' => 'required|string|max:255',
                'description' => 'required|string',
                'industry_category.*' => 'required|string',
                'status' => 'required|numeric',
            ];
        }
        return $rule;
    }

    public function messages(){

        return [
            'industries_image.required' => __('Industry Image is required'),
            'industries_image.mimes' => __('Industry Image must be a file of type: jpeg, png, jpg'),
            'industries_image.max' => __('Industry Image must not be greater than 2MB'),

            'industries_name.required' => __('Industry Name is required'),
            'industries_name.string' => __('Industry Name must be a string'),
            'industries_name.max' => __('Industry Name must not be greater than 255 characters'),

            'description.required' => __('Description is required'),
            'description.string' => __('Description must be a string'),

            'industry_category.*.required' => __('Industry Category is required'),
            'industry_category.*.string' => __('Industry Category must be a string'),

            'status.required' => __('Status is required'),
            'status.numeric' => __('Status must be a number'),
        ];
    }
}
