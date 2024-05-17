<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
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
            'firstName' => 'required|string|max:255',
            'lastName' => 'nullable|string|max:255',  // Endret til nullable for å tillate tomme verdier
            'email' => 'nullable|string|email|max:255|unique:customers,Email',
            'password' => 'nullable|string|min:8',
            'phone' => 'nullable|string',
        ];
    }
}
