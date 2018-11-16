<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactoForm extends FormRequest
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
          'correo' => 'required|email',
          'asunto' => 'required| between:3,80|regex:/^[a-zA-Zñ-Ñ0-9\s]+$/',
          'mensaje' => 'required| between:10,255'
        ];
    }

    public function messages()
    {
      return [
            'nombre.required' => 'el campo :attribute es requerido',
            'nombre.between' => 'el campo :attribute debe contener entre :min - :max letras',
            'nombre.regex' => 'el campo :attribute solo puede contetener letras',
            'correo.required' => 'el campo :attribute es requerido',
            'correo.email' =>'el campo :attribute no es valido',
            'asunto.required' =>'el campo :attribute es requerido',
            'asunto.between' => 'el campo :attribute debe contener entre :min - :max caracteres',
            'asunto.regex' => 'el campo :attribute contener letras y numeros',
            'mensaje.required'=>'el campo :attribute es requerido',
            'mensaje.between' => 'el campo :attribute debe contener enre :min - :max caracteres'
      ];

    }
}
