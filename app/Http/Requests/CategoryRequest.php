<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name' => 'required|string|max:40|unique:categories',
        ];

        if ($this->method() === 'PUT')
        {
            $rules['name'] = 'required|string|max:90|unique:categories,name,'.$this->route('category');
        }

        return $rules;
    }
}
