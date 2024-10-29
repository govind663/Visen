<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class CorporateHeadOfficeRequest extends FormRequest
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
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'bannerImage.*' => 'image|mimes:jpeg,png,jpg|max:2048',
                'address' => 'required|string|max:255',
                'mapLink' => 'required|string|max:255',
                'phoneNo' => 'required|string|max:255',
                'whatsAppNo' => 'required|string|max:255',
                'emailId' => 'required|string',
                'websiteLink' => 'required|string|max:255',
            ];
        }else{
            $rule = [
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'bannerImage.*' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'address' => 'required|string|max:255',
                'mapLink' => 'required|string|max:255',
                'phoneNo' => 'required|numeric',
                'whatsAppNo' => 'required|numeric',
                'emailId' => 'required|string',
                'websiteLink' => 'required|string|max:255',
            ];
        }
        return $rule;
    }

    public function messages(){

        return [

            'title.required' => __('Title is required'),
            'title.string' => __('Title must be a string'),

            'description.required' => __('Description is required'),
            'description.string' => __('Description must be a string'),

            'bannerImage.*.required' => __('Banner Image is required'),
            'bannerImage.*.image' => __('Banner Image must be an image'),
            'bannerImage.*.mimes' => __('Banner Image must be a file of type: jpeg, png, jpg'),
            'bannerImage.*.max' => __('Banner Image must not be greater than 2 MB'),

            'address.required' => __('Address is required'),
            'address.string' => __('Address must be a string'),
            'address.max' => __('Address must not be greater than 255 characters'),

            'mapLink.required' => __('Map Link is required'),
            'mapLink.string' => __('Map Link must be a string'),
            'mapLink.max' => __('Map Link must not be greater than 255 characters'),

            'phoneNo.required' => __('Phone Number is required'),
            'phoneNo.numeric' => __('Phone Number must be a number'),

            'whatsAppNo.required' => __("What's App Number is required"),
            'whatsAppNo.numeric' => __("What's App Number must be a number"),

            'emailId.required' => __('Email Id is required'),
            'emailId.email' => __('Email Id must be a valid email address'),
            'emailId.max' => __('Email Id must not be greater than 255 characters'),

            'websiteLink.required' => __('Website is required'),
            'websiteLink.string' => __('Website must be a string'),
            'websiteLink.max' => __('Website must not be greater than 255 characters'),

        ];
    }
}
