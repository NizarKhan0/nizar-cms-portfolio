<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HomeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // return false;
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
            'job_title' => 'required',
            'intro' => 'required',
            'description' => 'required',
            'cta_link' => 'required',
            'cta_text' => 'required',
            'nizar_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // 'nizar_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'job_title.required' => 'Job title is required',
            'intro.required' => 'Intro is required',
            'description.required' => 'Description is required',
            'cta_link.required' => 'Contact link is required',
            'cta_text.required' => 'Contact text is required',
            // 'nizar_image.required' => 'Nizar image is required',
            'nizar_image.image' => 'Nizar image must be an image',
            'nizar_image.mimes' => 'Nizar image must be a file of type: jpeg, png, jpg, gif, svg',
            'nizar_image.max' => 'Nizar image must not be greater than 2048 kilobytes',
        ];
    }
}
