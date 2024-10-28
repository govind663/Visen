<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class ProductCategoryRequest extends FormRequest
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
                'product_id' => 'required|numeric',
                'productCategoryName' => 'required|string|max:255',
                'name' => 'required|string|max:255',
                'solidContentInPercentage' => 'required|string|max:255',
                'viscosity' => 'required|string|max:255',
                'mfet' => 'required|string|max:255',
                'description' => 'required|string|max:255',
                'resource_doc' => 'nullable|mimes:jpeg,png,jpg,pdf|max:2048',
            ];
        }else{
            $rule = [
                'product_id' => 'required|numeric',
                'productCategoryName' => 'required|string|max:255',
                'name' => 'required|string|max:255',
                'solidContentInPercentage' => 'required|string|max:255',
                'viscosity' => 'required|string|max:255',
                'mfet' => 'required|string|max:255',
                'description' => 'required|string|max:255',
                'resource_doc' => 'nullable|mimes:jpeg,png,jpg,pdf|max:2048',
            ];
        }
        return $rule;
    }

    public function messages(){

        return [
            'product_id.required' => __('Product Name is required'),
            'product_id.numeric' => __('Product Name must be numeric'),

            'productCategoryName.required' => __('Product Category Name is required'),
            'productCategoryName.string' => __('Product Category Name must be string'),
            'productCategoryName.max' => __('Product Category Name must be less than 255 characters'),

            'name.required' => __('Sub Product Name is required'),
            'name.string' => __('Sub Product Name must be string'),
            'name.max' => __('Sub Product Name must be less than 255 characters'),

            'solidContentInPercentage.required' => __('Solid Content In Percentage is required'),
            'solidContentInPercentage.string' => __('Solid Content In Percentage must be string'),
            'solidContentInPercentage.max' => __('Solid Content In Percentage must be less than 255 characters'),

            'viscosity.required' => __('Viscosity is required'),
            'viscosity.string' => __('Viscosity must be string'),
            'viscosity.max' => __('Viscosity must be less than 255 characters'),

            'mfet.required' => __('Mfet is required'),
            'mfet.string' => __('Mfet must be string'),
            'mfet.max' => __('Mfet must be less than 255 characters'),

            'description.required' => __('Description is required'),
            'description.string' => __('Description must be string'),
            'description.max' => __('Description must be less than 255 characters'),

            // 'resource_doc.required' => __('Resources Document is required'),
            'resource_doc.mimes' => __('Resources Document must be a file of type: jpeg, png, jpg, pdf'),
            'resource_doc.max' => __('The size of Resources Document should not exceed 2 MB.'),
        ];
    }
}
