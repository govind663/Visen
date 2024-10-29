<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class FactoryDetailsRequest extends FormRequest
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
                'factoryImage' => 'image|mimes:jpeg,png,jpg|max:2048',
                'factoryLocationName' => 'required|string|max:255',
                'factoryName' => 'required|string|max:255',
                'factoryAddress' => 'required|string',
                'factoryLocationLink' => 'required|string|max:255',
                'status' => 'required|numeric|max:3',
            ];
        }else{
            $rule = [
                'factoryImage' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'factoryLocationName' => 'required|string|max:255',
                'factoryName' => 'required|string|max:255',
                'factoryAddress' => 'required|string',
                'factoryLocationLink' => 'required|string|max:255',
                'status' => 'required|numeric|max:3',
            ];
        }
        return $rule;
    }

    public function messages(){

        return [
            'factoryImage.required' => __('Factory Image is required'),
            'factoryImage.mimes' => __('Factory Image must be a file of type: jpeg, png, jpg'),
            'factoryImage.max' => __('The size of factory image should not exceed 2 MB.'),

            'factoryLocationName.required' => __('Factory Location Name is required'),
            'factoryLocationName.string' => __('Factory Location Name must be a string'),
            'factoryLocationName.max' => __('The size of Factory Location Name should not exceed 255 characters.'),

            'factoryName.required' => __('Factory Name is required'),
            'factoryName.string' => __('Factory Name must be a string'),
            'factoryName.max' => __('The size of Factory Name should not exceed 255 characters.'),

            'factoryAddress.required' => __('Factory Address is required'),
            'factoryAddress.string' => __('Factory Address must be a string'),

            'factoryLocationLink.required' => __('Factory Location Link is required'),
            'factoryLocationLink.string' => __('Factory Location Link must be a string'),
            'factoryLocationLink.max' => __('The size of Factory Location Link should not exceed 255 characters.'),

            'status.required' => __('Status is required'),
            'status.numeric' => __('Status must be numeric'),
            'status.max' => __('The size of Status should not exceed 3 characters.'),
        ];
    }
}
