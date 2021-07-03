<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required|string|max:90|unique:posts,title',
            'content' => 'required|string|max:3000',
            'categories' => 'nullable|sometimes|array|min:1',
            'categories.*' => 'nullable|sometimes|integer|exists:categories,id',
            'cover' => 'sometimes|nullable|file|image|max:2024',
        ];

        if ($this->method() === 'PUT')
        {
            $rules['title'] = 'required|string|max:90|unique:posts,title,'.$this->route('post');
        }

        return $rules;
    }
}
