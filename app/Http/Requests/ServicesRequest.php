<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServicesRequest extends FormRequest
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
        return [
            'service_package' => 'required',
            'service_description' => 'required',
            'service_price' => 'required',
            'features' => 'nullable|array', // Validate that 'features' is an array
            'features.*' => 'nullable|integer|exists:features,id', // Each feature ID should be an integer and exist in the features table
        ];
    }

    public function messages(): array
    {
        return [
            'service_package.required' => 'The service package field is required.',
            'service_description.required' => 'The service description field is required.',
            'service_price.required' => 'The service price field is required.',
            'features.array' => 'The features field must be an array of selected feature IDs.',
            'features.*.integer' => 'Each feature must be a valid ID.',
            'features.*.exists' => 'Selected feature is invalid.',
        ];
    }
}
