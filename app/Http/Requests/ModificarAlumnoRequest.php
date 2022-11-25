<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ModificarAlumnoRequest extends FormRequest
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
            'nombres' => 'nullable',
            'apellido_paterno' => 'nullable',
            'apellido_materno' => 'nullable',
            'rut' => 'nullable|min:9|max:10',
            'direccion' => 'nullable',
            'curso' => 'nullable',
            'genero' => 'nullable',
            'fecha_de_nacimiento' => 'nullable',
            'email' => 'nullable|unique:alumnos,email',
            'rut_apoderado' => 'nullable',
            'telefono' => 'nullable',
        ];
    }
}
