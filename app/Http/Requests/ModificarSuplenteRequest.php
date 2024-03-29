<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ModificarSuplenteRequest extends FormRequest
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
            'nombre' => 'nullable',
            'rut' => 'nullable|min:9|max:10|unique:apoderados_suplentes,run',
            'rut_apoderado_principal' => 'nullable',
            'email' => 'nullable|unique:apoderados_suplentes,email',
            'telefono' => 'nullable',
            'direccion' => 'nullable',
        ];
    }
}
