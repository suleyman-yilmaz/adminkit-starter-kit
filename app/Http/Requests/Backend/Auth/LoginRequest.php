<?php

namespace App\Http\Requests\Backend\Auth;

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
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:6'],
            'remember' => ['nullable', 'boolean'],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'remember' => $this->has('remember'),
        ]);
    }

    public function messages(): array
    {
        return [
            'email.required' => 'E-posta adresi zorunludur.',
            'email.email' => 'Geçerli bir e-posta adresi giriniz.',
            'password.required' => 'Şifre alanı boş bırakılamaz.',
            'password.min' => 'Şifre en az 6 karakter olmalıdır.',
        ];
    }

    public function credentials(): array
    {
        return [
            'email' => $this->input('email'),
            'password' => $this->input('password'),
        ];
    }

    public function remember(): bool
    {
        return $this->boolean('remember');
    }
}
