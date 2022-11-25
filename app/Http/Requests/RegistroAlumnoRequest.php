<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistroAlumnoRequest extends FormRequest
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
            'nombres' => 'required',
            'apellido_paterno' => 'required',
            'apellido_materno' => 'required',
            'rut' => 'required|min:9|max:10',
            'direccion' => 'nullable',
            'curso' => 'required',
            'genero' => 'required',
            'email' => 'nullable|unique:alumnos,email',
            'fecha_de_nacimiento' => 'required',
            'rut_apoderado' => 'required',
            'telefono' => 'nullable',
        ];
    }

}
