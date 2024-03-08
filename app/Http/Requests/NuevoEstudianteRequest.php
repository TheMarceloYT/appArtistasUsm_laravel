<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NuevoEstudianteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user'=>'required|min:5|max:40|unique:cuentas',
            'password'=>'required|min:4|max:50',
            'nombre'=>'required|max:50',
            'apellido'=>'required|max:50',
            'gmail'=>'required|max:80|email:rfc|unique:cuentas',
            'imagen'=>'required|dimensions:min_width=200,min_height=200'
        ];
    }

    //mensajes de error
    public function messages(): array
    {
        return [
            'user.required'=>'Ingrese el usuario',
            'user.min'=>'El usuario debe ser de largo minimo 5',
            'user.max'=>'El usuario no puede ser mayor de largo a 40',
            'user.unique'=>'El usuario ya existe',
            'password.required'=>'Ingrese la contraseña',
            'password.min'=>'La contraseña debe ser mayor a 4 caracteres',
            'password.max'=>'La contraseña no debe ser mayor a 50 caracteres',
            'nombre.required'=>'Ingrese el nombre',
            'nombre.max'=>'El nombre no debe ser mas largo que 50 caracteres',
            'apellido.required'=>'Ingrese el apellido',
            'apellido.max'=>'El apellido no debe ser mayor a 50 caracteres',
            'gmail.required'=>'Ingrese el correo',
            'gmail.max'=>'El correo no debe ser mayor a 80 caracteres',
            'gmail.email'=>'Ingrese un correo valido',
            'gmail.unique'=>'El correo ya existe',
            'imagen.required'=>'Ingrese la imagen',
            'imagen.dimensions'=>'Imagen 200x200 minima requerida'
        ];
    }
}
