<?php

namespace Magister\Http\Requests;

use Magister\Http\Requests\Request;

class UserCreateRequest extends Request
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
            'name' => 'required',
            'rut' => 'required|cl_rut|unique:users',
                        'email' => 'required|email|unique:users',

          'password' => 'min:6|required',
    'password_confirmation' => 'min:6|same:password' 
        ];
    }
}
