<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class addimage extends FormRequest
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'image.required' => 'El archivo debe ser una imagen tipo jpeg,png,jpg,gif,svg con un maximo de max:2048',
        ];
    }
}
