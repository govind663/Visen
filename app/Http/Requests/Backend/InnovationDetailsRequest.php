<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class InnovationDetailsRequest extends FormRequest
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
                'banner_image' => 'mimes:jpeg,png,jpg|max:2048',
                'banner_video' => 'mimes:mp4|max:80000',
                'title' => 'required|string|max:255',
                'description' => 'required|string',
            ];
        }else{
            $rule = [
                'banner_image' => 'mimes:jpeg,png,jpg|max:2048',
                'banner_video' => 'mimes:mp4|max:80000',
                'title' => 'required|string|max:255',
                'description' => 'required|string',
            ];
        }
        return $rule;
    }

    public function messages()
    {
        return [

            'banner_image.mimes' => __('Banner image must be a file of type: jpeg, png, jpg'),
            'banner_image.max' => __('The size of banner image should not exceed 2 MB.'),

            'banner_video.mimes' => __('Banner video must be a file of type: mp4.'),
            'banner_video.max' => __('The size of banner video should not exceed 80 MB.'),

            'title.required' => __('Title is required'),
            'title.string' => __('Title must be a string'),
            'title.max' => __('The size of title should not exceed 255 characters.'),

            'description.required' => __('Description is required'),
            'description.string' => __('Description must be a string'),
        ];
    }
}
