<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class GroupPoliciesRequest extends FormRequest
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
                'policy_doc.*' => 'mimes:jpeg,jpg,png,pdf|max:2048',
                'policy_name.*' => 'required|string|max:255',
                'description' => 'required|string',
            ];
        }else{
            $rule = [
                'policy_doc.*' => 'required|mimes:jpeg,jpg,png,pdf|max:2048',
                'policy_name.*' => 'required|string|max:255',
                'description' => 'required|string',
            ];
        }
        return $rule;
    }

    public function messages(){

        return [
            'policy_doc.*.required' => __('Policy Document is required'),
            'policy_doc.*.mimes' => __('Policy Document must be a file of type: jpeg, jpg, png, pdf'),
            'policy_doc.*.max' => __('Policy Document must not be greater than 2MB'),

            'policy_name.*.required' => __('Policy Name is required'),
            'policy_name.*.string' => __('Policy Name must be a string'),
            'policy_name.*.max' => __('Policy Name must not be greater than 255 characters'),

            'description.required' => __('Description is required'),
            'description.string' => __('Description must be a string'),
        ];
    }
}
