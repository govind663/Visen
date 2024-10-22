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
                'title' => 'required|string|max:255',
                'industries_image.*' => 'required|mimes:jpeg,png,jpg|max:2048',
                'industries_name.*' => 'required|string|max:255',
                'description.*' => 'required|string',
                'status' => 'required|numeric',
            ];
        }else{
            $rule = [
                'title' => 'required|string|max:255',
                'industries_image.*' => 'required|mimes:jpeg,png,jpg|max:2048',
                'industries_name.*' => 'required|string|max:255',
                'description.*' => 'required|string',
                'status' => 'required|numeric',
            ];
        }
        return $rule;
    }

    public function messages(){

        return [

            'title.required' => __('Title is required'),
            'title.string' => __('Title must be a string'),

            'industries_image.*.required' => __('Image is required'),
            'industries_image.*.mimes' => __('Image must be a file of type: jpeg, png, jpg'),

            'industries_name.*.required' => __('Name is required'),
            'industries_name.*.string' => __('Name must be a string'),

            'description.*.required' => __('Description is required'),
            'description.*.string' => __('Description must be a string'),

            'status.required' => __('Status is required'),
            'status.numeric' => __('Status must be a number'),
        ];
    }
}
