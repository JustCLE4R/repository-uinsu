<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'nim' => 'required|min:6|max:12',
            'password' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'required' => ':attribute harus diisi',
            'min' => 'minimal karakter :attribute adalah :min',
            'max' => 'maksimal karakter :attribute adalah :max',
        ];
    }

    public function attributes(): array
    {
        return [
            'nim' => 'NIM',
            'password' => 'Password',
        ];
    }

    // protected function prepareForValidation()
    // {
    //     $this->merge([
            
    //     ]);
    // }
}
