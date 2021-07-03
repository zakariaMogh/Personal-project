<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $rules = [
            'name' => 'required|string|max:40',
            'email' => 'required|email|max:90|unique:users',
            'password' => 'required|string|min:8|max:40|confirmed',
        ];

        if ($this->method() === 'PUT')
        {
            $rules['email'] = 'required|email|max:90|unique:users,email,'.$this->route('user');
            $rules['password'] = 'sometimes|nullable|string|confirmed|min:8|max:40';
        }

        return $rules;
    }
}
