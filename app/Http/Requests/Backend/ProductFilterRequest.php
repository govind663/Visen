<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class ProductFilterRequest extends FormRequest
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
                'filter_name.*' => 'required|string',
                'industry_id' => 'required|numeric',
                'category_id' => 'required|string',
            ];
        }else{
            $rule = [
                'filter_name.*' => 'required|string',
                'industry_id' => 'required|numeric',
                'category_id' => 'required|string',
            ];
        }
        return $rule;
    }

    public function messages(){

        return [
            'filter_name.*.required' => __('Filter NAme is required'),
            'filter_name.*.string' => __('Filter NAme must be a string'),

            'industry_id.required' => __('Industry Name is required'),
            'industry_id.numeric' => __('Industry Name must be a number'),

            'category_id.required' => __('Category Name is required'),
            'category_id.string' => __('Category Name must be a string'),
        ];

    }
}
