<?php

namespace Magister\Http\Controllers\Auth;

use Magister\User;
use Validator;
use Magister\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;


use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Session;
class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
       protected function getLogin()
    {
        return view("login");
    }


       

        public function postLogin(Request $request)
   {
    $this->validate($request, [
        'rut' => 'required',
        'password' => 'required',
    ]);



    $credentials = $request->only('rut', 'password');

    if ($this->auth->attempt($credentials, $request->has('remember')))
    {

        $usuarioactual=\Auth::user();
       return view('home')->with("usuario",  $usuarioactual);
    }

    return "credenciales incorrectas";

    }


//login

 //registro   


        protected function getRegister()
    {
        return view("registro");
    }


        

        protected function postRegister(Request $request)

   {
    $this->validate($request, [
        'name' => 'required',
        'rut' => 'required|cl_rut|unique:users',
      //  'password' => 'required',

            'password' => 'min:6|required',
    'password_confirmation' => 'min:6|same:password' 
    ]);


    $data = $request;


    $user=new User;
    $user->name=$data['name'];
    $user->rut=$data['rut'];
    $user->password=bcrypt($data['password']);



    if($user->save()){

         //return "se ha registrado correctamente el usuario";
return redirect()->guest('/'); 
    }
   

   

}

//registro

protected function getLogout()
    {
        $this->auth->logout();

        Session::flush();

        return redirect('login');
    }



}
