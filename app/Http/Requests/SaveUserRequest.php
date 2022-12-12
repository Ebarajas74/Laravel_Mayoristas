<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'name' => ['required', 'min:5'],
            'company' => ['required'],
            'email' => ['required'],
            'phone' => ['required'],
        ]+ [
            'role' => 'Mayorista',
            'password' => bcrypt('password')
        ];

        return $rules;
    }
}
