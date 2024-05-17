<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerRequest extends FormRequest
{
   
    public function authorize(): bool
    {
        // Her kan du tilføje logik for at autorisere brugeren
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
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
