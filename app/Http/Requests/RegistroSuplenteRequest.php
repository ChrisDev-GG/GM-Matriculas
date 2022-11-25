<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistroSuplenteRequest extends FormRequest
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
            'rut' => 'required|min:9|max:10|unique:apoderados_suplentes,run',
            'rut_apoderado_principal' => 'required',
            'email' => 'nullable|unique:apoderados_suplentes,email',
            'telefono' => 'nullable',
            'direccion' => 'nullable',
        ];
    }
}
