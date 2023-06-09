<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingProductRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'sender_name' => 'required|min:3',
            'quantity' => 'required',
            'user_id' => 'nullable|exists:users,id',
            'email' => 'nullable|email',
            'no_hp' => 'nullable|numeric',
            'address' => 'required|min:10|max:100',
            'province' => 'required',
            'city' => 'required',
            'postal_code' => 'required|numeric',
            'district' => 'required',
            'shipping' => 'required',
        ];
    }
}
