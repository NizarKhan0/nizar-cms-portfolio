<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkExperienceRequest extends FormRequest
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
            'job_position' => 'required',
            'company_name' => 'required',
            'company_address' => 'required',
            'work_start_date' => 'required|date',
            'work_end_date' => 'nullable|date',
        ];
    }

    public function messages(): array
    {
        return [
            'job_position.required' => 'The job position field is required.',
            'company_name.required' => 'The company name field is required.',
            'company_address.required' => 'The company address field is required.',
            'work_start_date.required' => 'The work start date field is required.',
            'work_end_date.date' => 'The work end date must be a valid date.',
        ];
    }
}
