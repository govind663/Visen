<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class AnnualReportsRequest extends FormRequest
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
                'report_doc.*' => 'image|mimes:pdf|max:2048',
                'report_name.*' => 'required|string|max:255',
                'description' => 'required|string',
            ];
        }else{
            $rule = [
                'report_doc.*' => 'required|image|mimes:pdf|max:2048',
                'report_name.*' => 'required|string|max:255',
                'description' => 'required|string',
            ];
        }
        return $rule;
    }

    public function messages(){

        return [
            'report_doc.*.required' => __('Report Document is required'),
            'report_doc.*.mimes' => __('Report Document must be a file of type: pdf'),
            'report_doc.*.max' => __('Report Document must not be greater than 2MB'),

            'report_name.*.required' => __('Report Name is required'),
            'report_name.*.string' => __('Report Name must be a string'),
            'report_name.*.max' => __('Report Name must not be greater than 255 characters'),

            'description.required' => __('Description is required'),
            'description.string' => __('Description must be a string'),
        ];
    }
}
