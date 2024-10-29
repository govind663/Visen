<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class FeaturesRequest extends FormRequest
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
            ];
        }else{
            $rule = [
                'title' => 'required|string|max:255',
            ];
        }
        return $rule;
    }

    public function messages(){

        return [
            'title.required' => __('Title is required'),
            'title.string' => __('Title must be a string'),
            'title.max' => __('Title must not exceed 255 characters'),
        ];
    }
}
