<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistroApoderadoRequest extends FormRequest
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
    public function rules()
    {
        return [
            'nombre' => 'required',
            'rut' => 'required|min:9|max:10|unique:apoderados,run',
            'email' => 'nullable|unique:apoderados,email',
            'telefono' => 'nullable',
            'direccion' => 'nullable',
        ];
    }

}
