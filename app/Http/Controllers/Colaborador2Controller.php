<?php
namespace Magister\Http\Controllers;

use Magister\Colaborador;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Magister\Profesor;


use Illuminate\Http\Request;
use Magister\Http\Requests;
use Magister\Http\Requests\UserCreateRequest;
use Magister\Http\Requests\UserUpdateRequest;
use Magister\Http\Controllers\Controller;
use Magister\User;
use Redirect;
use Illuminate\Routing\Route;

use Carbon\Carbon;
use DB;

use Magister\Director;

use Magister\Nucleo;

use Magister\Visitante;

class Colaborador2Controller extends Controller
{


  public function __construct(){
        $this->middleware('auth');
      //  $this->middleware('admin');
        $this->beforeFilter('@find',['only' => ['edit','update','destroy']]);
    }

    public function find(Route $route){
        $this->user = User::find($route->getParameter('usuario'));
    }

    public function getIndex()
    {
        return view('colaborador2.index');
    }

    public function getList()
    {
        Session::put('colaborador2_search', Input::has('ok') ? Input::get('search') : (Session::has('colaborador2_search') ? Session::get('colaborador2_search') : ''));
        Session::put('colaborador2_field', Input::has('field') ? Input::get('field') : (Session::has('colaborador2_field') ? Session::get('colaborador2_field') : 'id'));
        Session::put('colaborador2_sort', Input::has('sort') ? Input::get('sort') : (Session::has('colaborador2_sort') ? Session::get('colaborador2_sort') : 'asc'));
                        $profesor = colaborador::profesor();
        $colaboradors = profesor::where('id', 'like', Session::get('colaborador2_search') . '%')->orWhere('PRO_PATERNO','like',  Session::get('colaborador2_search') . '%')
->orderBy(Session::get('colaborador2_field'), Session::get('colaborador2_sort'))
        ->paginate(500);

                        $colaboradors2 = colaborador::all();



                            //$profesor = Departamento::lists('name', 'id');

                return view('colaborador2.list',compact('colaboradors','profesor','colaboradors2'));


        //return view('colaborador.list', ['colaboradors' => $colaboradors]);
    }

    public function getUpdate($id)
    {
        //return view('colaborador.update', ['colaborador' => colaborador::find($id)]);

            $profesor = Profesor::lists('id', 'id');

        
    
        return view('colaborador2.update', ['colaborador' => colaborador::find($id)],compact('profesor'));
    }

    public function postUpdate($id)
    {
        $colaborador = colaborador::find($id);
        

    
            $rules = ['id' => 'required|cl_rut|unique:NUCLEO|unique:DIRECTOR|unique:COLABORADOR|unique:VISITANTE'];

      // if ($colaborador->id != Input::get('id'))
           // $rules += ['id' => 'required|cl_rut|unique:colaboradors'];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
                        $colaborador->id = Input::get('id');

      

        $colaborador->save();
        return ['url' => 'colaborador2/list'];
    }

 



    public function getCreate($id)
    {
        //return view('colaborador.update', ['colaborador' => colaborador::find($id)]);

            //$profesor = Profesor::lists('id', 'id');

               $profesor=profesor::where('id', '=', $id)
                ->first();
    
        return view('colaborador2.create', ['colaborador' => profesor::find($id)],compact('profesor'));
    }

    public function postCreate($id)
    {
         $profesor = profesor::find($id);
        

         


         $validator = Validator::make(Input::all(), [
            "id" => "required|cl_rut|unique:NUCLEO|unique:DIRECTOR|unique:COLABORADOR|unique:VISITANTE"]);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }

                       $colaborador = new colaborador();
                             $colaborador->id = Input::get('id');


        $colaborador->save();
        return ['url' => 'colaborador2/list'];
    }

    public function getDelete($id)
    {
        colaborador::destroy($id);
        return Redirect('colaborador2/list');
    }


  



public function getShow2($id)
    {
$profesor= profesor::paginate();
                    $DEPARTAMENTO = profesor::DEPARTAMENTO();
                     $director=Director::all();    

        $nucleo=Nucleo::all();    

        $visitante=Visitante::all();    

        $colaborador=Colaborador::all();  

        return view('colaborador2.show2',compact('profesor','id','DEPARTAMENTO','director','nucleo','visitante','colaborador'));    }
} 
