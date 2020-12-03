<?php

namespace Magister\Http\Controllers\Auth;

use Magister\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Auth;


use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;

class PasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Create a new password controller instance.
     *
     * @return void
     */
    protected $redirectTo = '/';
    protected function resetPassword($user, $password){
            $user->password = $password;
            $user->save();
            $id=$user->id;
               $usuario= DB::table('users')
            ->where('id', $id)
            ->update(['password' => $password]);


            //Auth::login($user);
    }
    public function __construct()
    {
        $this->middleware('guest');
    }
}
