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
            'full_name' => ['required', 'min:1', 'max:75'],
            'phone_number' => ['required', 'min:4', 'max:30'],
            'email' => ['required', 'email', 'min:4', 'max:150'],
            'dni_number' => ['required', 'integer', 'min:100000', 'max:999999999', 'unique:customers'],
            'dni_frontpic' => ['required', 'image'],
            'dni_backpic' => ['required', 'image']
        ];
    }
}
