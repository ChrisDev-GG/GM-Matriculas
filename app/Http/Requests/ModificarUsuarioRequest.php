<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ModificarUsuarioRequest extends FormRequest
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
            'email' => 'nullable|unique:users,email',
            'tipo_de_usuario' => 'nullable',
            'nombre_de_usuario' => 'nullable|unique:users,username',
            'contraseña' => 'nullable|min:8',
        ];
    }
}
