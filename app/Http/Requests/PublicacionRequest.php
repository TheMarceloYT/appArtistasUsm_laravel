<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PublicacionRequest extends FormRequest
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
            'titulo'=>'required|min:5|max:30',
            'descripcion'=>'required|min:10|max:100',
            'imagen'=>'required|dimensions:min_width=200,min_height=200'
        ];
    }

    public function messages()
    {
        return [
            'titulo.required'=>'Ingrese el titulo',
            'titulo.min'=>'El titulo debe ser de largo minimo 5',
            'titulo.max'=>'El titulo no puede ser mayor de largo a 30',
            'descripcion.required'=>'Ingrese la descripcion',
            'descripcion.min'=>'La descripcion debe ser mayor a 10 caracteres',
            'descripcion.max'=>'La descripcion no debe ser mayor a 100 caracteres',
            'imagen.required'=>'Ingrese la imagen',
            'imagen.dimensions'=>'Imagen 600x600 minima requerida'
        ];
    }
}
