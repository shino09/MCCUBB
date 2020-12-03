<?php
namespace Magister\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Magister\Departamento;
use Magister\Contrato;


use Illuminate\Http\Request;
use Magister\Http\Requests;
use Magister\Http\Requests\UserCreateRequest;
use Magister\Http\Requests\UserUpdateRequest;
use Magister\Http\Requests\UserUpdate2Request;

use Magister\Http\Controllers\Controller;
use Magister\User;
use Redirect;
use Illuminate\Routing\Route;

use Carbon\Carbon;
use DB;

class UsuarioController extends Controller
{


  public function __construct(){
        $this->middleware('auth');
        $this->middleware('admin');
        $this->beforeFilter('@find',['only' => ['edit','update','destroy']]);
    }

    public function find(Route $route){
        $this->user = User::find($route->getParameter('usuario'));
    }

    public function getIndex()
    {
        return view('usuario.index');
    }

    public function getList()
    {
        Session::put('usuario_search', Input::has('ok') ? Input::get('search') : (Session::has('usuario_search') ? Session::get('usuario_search') : ''));
        Session::put('usuario_field', Input::has('field') ? Input::get('field') : (Session::has('usuario_field') ? Session::get('usuario_field') : 'name'));
        Session::put('usuario_sort', Input::has('sort') ? Input::get('sort') : (Session::has('usuario_sort') ? Session::get('usuario_sort') : 'asc'));
        $usuarios = user::where('rut', 'like', Session::get('usuario_search') . '%')

    ->orWhere('APELLIDOPATERNO','like',  Session::get('usuario_search') . '%')
            ->orderBy(Session::get('usuario_field'), Session::get('usuario_sort'))->paginate(20);

              

                            //$departamentos = Departamento::lists('name', 'id');

                return view('usuario.list',compact('usuarios'));


        //return view('usuario.list', ['usuarios' => $usuarios]);
    }

    public function getUpdate($id)
    {
        //return view('usuario.update', ['usuario' => usuario::find($id)]);

        
        
    
        return view('usuario.update', ['usuario' => User::find($id)]);
    }


public function postUpdate(UserUpdateRequest $request, $id)
    {

           $usuario = User::find($id);
        

         $rules = ["name" => "required", "email" => "required|email" ,"tipoUsuario" => "required","APELLIDOPATERNO" => "required","APELLIDOMATERNO" => "required"
];
       if ($usuario->rut != Input::get('rut'))
            $rules += ['rut' => 'required|cl_rut'];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }



           
$usuario= DB::table('users')->where('id',$id)->delete();

$data = $request;
 $usuario=DB::table('users')->insert([
            'name' =>  $data['name'],
            'rut' => $data['rut'],
                        'APELLIDOPATERNO' =>  $data['APELLIDOPATERNO'],

            'APELLIDOMATERNO' =>  $data['APELLIDOMATERNO'],


                        'email' => $data['email'],

                        'tipoUsuario' => $data['tipoUsuario'],


            'password' => bcrypt($data['password']),



        ]);


 

      
                return ['url' => 'usuario/list'];

        
    }


 public function getUpdate2($id)
    {
        //return view('usuario.update', ['usuario' => usuario::find($id)]);

        
        
    
        return view('usuario.update2', ['usuario' => User::find($id)]);
    }


public function postUpdate2(UserUpdate2Request $request, $id)
    {

           $usuario = User::find($id);
        

         $rules = ["name" => "required", "email" => "required|email" ,"tipoUsuario" => "required","APELLIDOPATERNO" => "required","APELLIDOMATERNO" => "required"
];
       if ($usuario->rut != Input::get('rut'))
            $rules += ['rut' => 'required|cl_rut'];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }

 

$data = $request;
  $usuario= DB::table('users')
            ->where('id', $id)
            ->update([
            'name' =>  $data['name'],
            'rut' => $data['rut'],
                        'APELLIDOPATERNO' =>  $data['APELLIDOPATERNO'],

            'APELLIDOMATERNO' =>  $data['APELLIDOMATERNO'],


                        'email' => $data['email'],

                        'tipoUsuario' => $data['tipoUsuario']


            //'password' => bcrypt($data['password'])
            ]);

   
                return ['url' => 'usuario/list'];

        
    }

  
    public function getCreate()
    {
        //return view('usuario.create');

      


        return view('usuario.create');
    }

   


    public   function postCreate(Request $request)

   {

      $messages=[
            'rut.cl_rut' => 'El RUT ingresado no es Valido',
        ];

         $validator = Validator::make(Input::all(), [
           
   'name' => 'required',
        'rut' => 'required|regex:/^\S*$/u|cl_rut|unique:users',
       'email' => 'required|email',

            'password' => 'min:6|required',
    'password_confirmation' => 'min:6|same:password' ,"tipoUsuario" => "required","APELLIDOPATERNO" => "required","APELLIDOMATERNO" => "required"
],$messages);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }



$data = $request;
 $usuario=DB::table('users')->insert([
            'name' =>  $data['name'],
            'rut' => $data['rut'],
                        'APELLIDOPATERNO' =>  $data['APELLIDOPATERNO'],

            'APELLIDOMATERNO' =>  $data['APELLIDOMATERNO'],


                        'email' => $data['email'],

                        'tipoUsuario' => $data['tipoUsuario'],


            'password' => bcrypt($data['password']),



        ]);

        return ['url' => 'usuario/list'];























}

    public function getDelete($id)
    {
        //User::destroy($id);

        $usuario= DB::table('users')->where('id',$id)->delete();

        return Redirect('usuario/list');
    }


   public function getShow($id)
    {
        return view('usuario.show', ['usuario' => User::find($id)]);
    }

      public function getShow2($id)
    {
$usuario= user::paginate();

        return view('usuario.show2',compact('usuario','id'));    }

} 
