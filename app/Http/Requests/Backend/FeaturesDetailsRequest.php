<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class FeaturesDetailsRequest extends FormRequest
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
                'featureImage' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'title' => 'nullable|string|max:255',
                'description' => 'nullable|string',
                'features_id' => 'required|integer',
            ];
        }else{
            $rule = [
                'featureImage' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'title' => 'nullable|string|max:255',
                'description' => 'nullable|string',
                'features_id' => 'required|integer',
            ];
        }
        return $rule;
    }

    public function messages(){

        return [
            'featureImage.required' => __('Image is required'),
            'featureImage.mimes' => __('Image must be a file of type: jpeg, png, jpg'),
            'featureImage.max' => __('The size of image should not exceed 2 MB.'),

            'title.required' => __('Title is required'),
            'title.string' => __('Title must be a string'),
            'title.max' => __('The size of title should not exceed 255 characters.'),

            'description.required' => __('Description is required'),
            'description.string' => __('Description must be a string'),
            'description.max' => __('The size of description should not exceed 255 characters.'),

            'features_id.required' => __('Feature Name is required'),
            'features_id.integer' => __('Feature Name must be a integer'),
        ];
    }
}
