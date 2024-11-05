<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PortfolioRequest extends FormRequest
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
            'project_title' => 'required',
            'project_description' => 'required',
            'project_link' => 'nullable|url',
            'project_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'skills' => 'array', // Validate that 'skills' is an array
            'skills.*' => 'integer|exists:skills,id', // Each skill ID should be an integer and exist in the skills table
        ];
    }

    public function messages(): array
    {
        return [
            'project_title.required' => 'Project title is required',
            'project_description.required' => 'Project description is required',
            'project_link.url' => 'Project link must be a valid URL',
            'project_image.image' => 'Project image must be an image',
            'project_image.mimes' => 'Project image must be a file of type: jpeg, png, jpg, gif, svg',
            'project_image.max' => 'Project image size must be less than 2MB',
            'skills.array' => 'Skills must be an array of selected skill IDs',
            'skills.*.integer' => 'Each skill must be a valid ID',
            'skills.*.exists' => 'Selected skill is invalid',
        ];
    }
}
