<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
                'image' => 'image|mimes:jpeg,png,jpg|max:2048',
            ];
        }else{
            $rule = [
                'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ];
        }
        return $rule;
    }
    
    public function messages(){

        return [
            'image.required' => __('Image is required'),
            'image.mimes' => __('Image must be a file of type: jpeg, png, jpg'),
            'image.max' => __('The size of image should not exceed 2 MB.'),
        ];
    }
    
}
