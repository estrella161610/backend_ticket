<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AgenteRequest extends FormRequest
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
            'id_departamento' => 'required|exists:departamentos,id',
            'id_grupo' => 'required|exists:grupos,id',
            'icono' => 'required|mimes:jpeg,png,jpg|max:5120',
            'nombre' => 'required|min:2|max:150|regex:/^[a-zA-Z\s]+$/',
            'telefono' => 'required|min:10|max:10',
            'estado_agente' => 'required|in:activo,inactivo,no_disponible',
            'estatus' => 'required|boolean'

        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'id_departamento.required' => 'El campo departamento es obligatorio.',
            'id_departamento.exists' => 'El departamento seleccionado no es válido.',
            'id_grupo.required' => 'El campo grupo es obligatorio.',
            'id_grupo.exists' => 'El grupo seleccionado no es válido.',
            'icono.required' => 'El icono es obligatorio.',
            'icono.mimes' => 'El icono debe ser una imagen en formato: jpeg, png, jpg.',
            'icono.max' => 'El tamaño del icono no debe superar los 5MB.',
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.string' => 'El nombre debe ser una cadena de texto.',
            'nombre.min' => 'El nombre debe tener al menos 2 caracteres.',
            'nombre.max' => 'El nombre no puede tener más de 150 caracteres.',
            'nombre.regex' => 'El nombre solo debe contener letras y espacios.',
            'telefono.required' => 'El teléfono es obligatorio.',
            'telefono.digits_between' => 'El teléfono debe tener entre 10.',
            'estado_agente.required' => 'El estado del agente es obligatorio.',
            'estado_agente.in' => 'El estado del agente debe ser uno de los siguientes: activo, inactivo, no disponible.',
            'estatus.required' => 'El estatus es obligatorio.',
            'estatus.boolean' => 'El estatus debe ser verdadero (1) o falso (0).'
        ];
    }
}
