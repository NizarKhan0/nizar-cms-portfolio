<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EducationRequest extends FormRequest
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
            'education_name' => 'required',
            'institution_name' => 'required',
            'institution_address' => 'required',
            'education_start_date' => 'required|date',
            'education_end_date' => 'nullable|date',
        ];
    }

    public function messages(): array
    {
        return [
            'education_name.required' => 'Education name is required',
            'institution_name.required' => 'Institution name is required',
            'institution_address.required' => 'Institution address is required',
            'education_start_date.required' => 'Education start date is required',
            'education_end_date.required' => 'Education end date is required',
        ];
    }
}
