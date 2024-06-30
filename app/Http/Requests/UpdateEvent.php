<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEvent extends FormRequest
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
            'titulo' => 'required|min:5',
            'subtitulo' => 'required|min:5',
            'descripcion' => 'required|min:10',
            'fecha' => 'required',
            'lugar' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'El campo nombre no puede ser vacio y debe contener al menos 3 caracteres',
        ];
    }
}
