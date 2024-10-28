<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class MembersRequest extends FormRequest
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
                'meet_our_minds_id' => 'required|numeric',
                'memberName' => 'required|string|max:255',
                'memberPosition' => 'required|string|max:255',
                'memberDescription' => 'required|string',
                'socialMediaIcon.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'socialMediaUrl.*' => 'nullable|string|max:255',
                'memberProfilePic' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'status' => 'required|numeric',
            ];
        }else{
            $rule = [
                'meet_our_minds_id' => 'required|numeric',
                'memberName' => 'required|string|max:255',
                'memberPosition' => 'required|string|max:255',
                'memberDescription' => 'required|string',
                'socialMediaIcon.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'socialMediaUrl.*' => 'nullable|string|max:255',
                'memberProfilePic' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'status' => 'required|numeric',
            ];
        }
        return $rule;
    }

    public function messages(){

        return [
            'meet_our_minds_id.required' => __('Team Name is required'),
            'meet_our_minds_id.numeric' => __('Team Name must be numeric'),

            'memberName.required' => __('Member Name is required'),
            'memberName.string' => __('Member Name must be a string'),
            'memberName.max' => __('The size of Member Name should not exceed 255 characters.'),

            'memberPosition.required' => __('Member Position is required'),
            'memberPosition.string' => __('Member Position must be a string'),
            'memberPosition.max' => __('The size of Member Position should not exceed 255 characters.'),

            'memberDescription.required' => __('Member Description is required'),
            'memberDescription.string' => __('Member Description must be a string'),

            // 'socialMediaIcon.*.required' => __('Social Media Icon is required'),
            'socialMediaIcon.*.image' => __('Social Media Icon must be a file of type: jpeg, png, jpg'),
            'socialMediaIcon.*.max' => __('The size of Social Media Icon should not exceed 2 MB.'),

            // 'socialMediaUrl.*.required' => __('Social Media Url is required'),
            'socialMediaUrl.*.string' => __('Social Media Url must be a string'),
            'socialMediaUrl.*.max' => __('The size of Social Media Url should not exceed 255 characters.'),

            'memberProfilePic.required' => __('Member Profile Image is required'),
            'memberProfilePic.mimes' => __('Member Profile Image must be a file of type: jpeg, png, jpg'),
            'memberProfilePic.max' => __('The size of Member Profile Image should not exceed 2 MB.'),

            'status.required' => __('Status is required'),
            'status.numeric' => __('Status must be numeric'),
        ];

    }
}
