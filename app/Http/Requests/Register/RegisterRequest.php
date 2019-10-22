<?php

namespace App\Http\Requests\Register;

use Illuminate\Foundation\Http\FormRequest;

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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'birthday' => 'required|date|date_format:Y-m-d|before:' . strtotime(now()),
            'phone' => 'required|regex:/^(0[1-9][0-9]{8})$/',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'birthday.before' => 'Birthday must be before ' . date('Y-m-d', strtotime(now()))
        ];
    }
}
