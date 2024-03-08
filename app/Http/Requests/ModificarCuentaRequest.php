<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ModificarCuentaRequest extends FormRequest
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
            'nombre'=>'required|max:50',
            'apellido'=>'required|max:50',
            'gmail'=>'required|max:80|email:rfc',
            'id'=>'required|exists:roles',
            'imagen'=>'image|nullable'
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required'=>'Ingrese el nombre',
            'nombre.max'=>'El nombre no debe ser mas largo que 50 caracteres',
            'apellido.required'=>'Ingrese el apellido',
            'apellido.max'=>'El apellido no debe ser mayor a 50 caracteres',
            'gmail.required'=>'Ingrese el correo',
            'gmail.max'=>'El correo no debe ser mayor a 80 caracteres',
            'gmail.email'=>'Ingrese un correo valido',
            'id.required'=>'Ingrese el rol',
            'id.exists'=>'El rol no existe'
        ];
    }
}
