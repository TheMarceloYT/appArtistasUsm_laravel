<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComentariosRequest extends FormRequest
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
            'comentario'=>'required|max:300'
        ];
    }

    //mensajes de error
    public function messages(): array
    {
        return [
            'comentario.required'=>'Ingrese el comentario',
            'comentario.max'=>'El comentario debe ser menor a 300 caracteres'
        ];
    }
}
