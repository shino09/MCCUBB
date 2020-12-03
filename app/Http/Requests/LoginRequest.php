<?php

namespace Magister\Http\Requests;

use Magister\Http\Requests\Request;

class LoginRequest extends Request
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
            'password'=> 'required',
            'rut' => 'required|cl_rut|exists:users',
        ];
    }



     public function messages()
   {
        return [
            'rut.cl_rut' => 'El RUT ingresado no es Valido',
        ];
    }
}
