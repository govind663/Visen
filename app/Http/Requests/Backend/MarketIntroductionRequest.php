<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class MarketIntroductionRequest extends FormRequest
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
                'introduction' => 'required|string',
            ];
        }else{
            $rule = [
                'introduction' => 'required|string',
            ];
        }
        return $rule;
    }

    public function messages(){

        return [
            'introduction.required' => __('Introduction is required'),
            'introduction.string' => __('Introduction must be string'),
            'introduction.max' => __('Introduction must be less than 255 characters'),
        ];

    }
}
