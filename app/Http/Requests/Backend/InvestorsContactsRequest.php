<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class InvestorsContactsRequest extends FormRequest
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
                'investor_image' => 'image|mimes:jpeg,png,jpg|max:2048',
                'investor_designation' => 'required|string|max:255',
                'investor_address' => 'required|string',
                'investor_name' => 'required|string|max:255',
                'investor_email' => 'required|email|max:255',
                'investor_tel' => 'nullable|string',
                'investor_fax' => 'nullable|string',
                'investor_website' => 'nullable|string',
                'status' => 'required|numeric|max:3',
            ];
        }else{
            $rule = [
                'investor_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'investor_designation' => 'required|string|max:255',
                'investor_address' => 'required|string',
                'investor_name' => 'required|string|max:255',
                'investor_email' => 'required|email|max:255',
                'investor_tel' => 'nullable|string',
                'investor_fax' => 'nullable|string',
                'investor_website' => 'nullable|string',
                'status' => 'required|numeric|max:3',
            ];
        }
        return $rule;
    }

    public function messages(){

        return [

            'investor_image.required' => __('Profile Image is required'),
            'investor_image.mimes' => __('Profile Image must be a file of type: jpeg, png, jpg'),
            'investor_image.max' => __('The size of profile image should not exceed 2 MB.'),

            'investor_designation.required' => __('Designation is required'),
            'investor_designation.string' => __('Designation must be a string'),
            'investor_designation.max' => __('The size of designation should not exceed 255 characters.'),

            'investor_address.required' => __('Address is required'),
            'investor_address.string' => __('Address must be a string'),

            'investor_name.required' => __('Name is required'),
            'investor_name.string' => __('Name must be a string'),
            'investor_name.max' => __('The size of name should not exceed 255 characters.'),

            'investor_email.required' => __('Email is required'),
            'investor_email.string' => __('Email must be a string'),
            'investor_email.max' => __('The size of email should not exceed 255 characters.'),

            // 'investor_tel.required' => __('Telephone No. is required'),
            'investor_tel.string' => __('Telephone must be a string'),

            // 'investor_fax.required' => __('Fax No. is required'),
            'investor_fax.string' => __('Fax must be a string'),

            // 'investor_website.required' => __('Website is required'),
            'investor_website.string' => __('Website must be a string'),

            'status.required' => __('Status is required'),
            'status.numeric' => __('Status must be a numeric'),
            'status.max' => __('The status size should not exceed 3 characters.'),
        ];

    }
}
