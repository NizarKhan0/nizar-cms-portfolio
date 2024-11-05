<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'number_phone' => 'required',
            'email' => 'required',
            'address' => 'required',
            'contact_logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'number_phone.required' => 'The number phone field is required.',
            'email.required' => 'The email field is required.',
            'address.required' => 'The address field is required.',
            'contact_logo.image' => 'The contact logo must be an image.',
            'contact_logo.mimes' => 'The contact logo must be a file of type: jpeg, png, jpg, gif, svg.',
            'contact_logo.max' => 'The contact logo may not be greater than 2,048 kilobytes.',
        ];
    }
}
