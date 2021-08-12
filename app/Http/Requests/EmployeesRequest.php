<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeesRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'nombre' => 'required|string|min:4',
            'email' => 'required|email|unique:employees,email',
            'puesto' => 'required|string|min:4',
            'fecha_nacimiento' => 'required|date',
            'domicilio' => 'required|string|min:10',
            'skill' => 'required|array'
        ];
    }

    public function messages(){
        return[
            // validaciones para requeridos
            'nombre.required' => 'El :attribute es requerido',
            'email.required' => 'El :attribute es requerido',
            'puesto.required' => 'El :attribute es requerido',
            'fecha_nacimiento.required' => 'El :attribute es requerido',
            'domicilio.required' => 'El :attribute es requerido',
            'skill.required' => 'El :attribute es requerido',
            // Validaciones de tipo de dato
            'nombre.string' => 'El :attribute debe ser un string',
            'email.email' => 'El :attribute debe ser un correo valido',
            'puesto.string' => 'El :attribute debe ser un string',
            'domicilio.string' => 'El :attribute debe ser un string',
            // validacion de minimo de caracteres
            'nombre.min' => 'El :attribute debe tener al menos 4 caracteres',
            'puesto.min' => 'El :attribute debe tener al menos 4 caracteres',
            'domicilio.min' => 'El :attribute debe tener al menos 10 caracteres',
            // validamos array
            'skill.array' => 'El :attribute debe ser un arreglo de skills',
            // validamos fecha
            'fecha_nacimiento.date' => 'El :attribute debe ser una fecha con formato YYYY/MM/DD'
        ];
    }

    public function attributes(){
        return[
            'nombre' => 'Nombre',
            'email' => 'Email',
            'puesto' => 'Puesto',
            'fecha_nacimiento' => 'FechaNacimiento',
            'domicilio' => 'Domicilio',
            'skill' => 'Skill'
        ];
    }
}
