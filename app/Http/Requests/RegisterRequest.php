<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;
use App\Models\User;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        // return [
        //     'email' => 'required|string|email:rfc,dns|max:255|unique:users|ends_with:gmail.com',
        //     'username' => 'required|string|min:5|max:255|unique:users',
        //     'password' => 'required|string|max:255|min:6|confirmed'
        // ];
        return [
            'name' => ['required', 'string', 'max:255', 'unique:'.User::class],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Password::defaults(), 'min:5'],
        ];
    }
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages():array
    {

            // dd('masuk');
        return [
            'name.unique' => 'Nama harus unique',
            'email.required' => 'emailnya harus diisi ya',
            'password.min' => 'password harus minimal 5',
            'password.max' => 'password max 8'
        ];
    }
}
