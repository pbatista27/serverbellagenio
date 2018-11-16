<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserForm extends FormRequest
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
          'nombre' => 'required|between:3,20|regex:/^[a-zA-Zñ-Ñ\s]+$/',
          'apellido' => 'required|between:3,20|regex:/^[a-zA-Zñ-Ñ\s]+$/',
          'fecha_nacimiento' =>'required|date',
          'email' => 'required|email|unique:users,email',
          'telefono' => 'required|regex:/^[0-9]+$/',
          'password' => 'required|min:8',
        ];
    }


    public function messages()
    {
      return [
          'nombre.required' => 'el campo :attribute es requerido',
          'nombre.between' => 'el campo :attribute debe contener entre :min - :max caracteres ',
          'nombre.regex' => 'el campo :attribute solo se aceptan letras',
          'apellido.required' => 'el campo :attribute es requerido',
          'apellido.between' => 'el campo :attribute debe contener entre :min - :max caracteres ',
          'apellido.regex' => 'el campo :attribute solo se aceptan letras',
          'fecha_nacimiento.required' => 'el campo :attribute es requerido',
          'fecha_nacimiento.date' => 'el campo :attribute solo se permite valores de tipo fecha',
          //'fecha_nacimiento.regex' => 'el campo :attribute contiene formato de fecha no permitido',
          'email.required' =>'el campo :attribute es requirido',
          'email.unique' => 'el :attribute ya se encuentra registrado en el sistema',
          'telefono.required' =>'el campo :attribute es requerido',
          'telefono.regex' =>' el campo :attribute solo se aceptan numeros',
          'password.required' =>'el campo :attribute es requerido',
          'password.min' => 'el campo :attribute debe contener :min o mas caracteres'
      ];
    }
}
