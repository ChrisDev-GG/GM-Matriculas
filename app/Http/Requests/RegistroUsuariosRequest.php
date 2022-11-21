<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistroUsuariosRequest extends FormRequest
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
            'email' => 'required|unique:users,email',
            'tipo_de_usuario' => 'required',
            'nombre_de_usuario' => 'required|unique:users,username',
            'contraseña' => 'required|min:8',
            'confirmar_contraseña' => 'required|same:contraseña',
        ];
    }
}
