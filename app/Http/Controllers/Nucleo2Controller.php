<?php
namespace Magister\Http\Controllers;

use Magister\Nucleo;
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


use Magister\Visitante;
use Magister\Colaborador;


class Nucleo2Controller extends Controller
{


  public function __construct(){
        $this->middleware('auth');
       // $this->middleware('admin');
        $this->beforeFilter('@find',['only' => ['edit','update','destroy']]);
    }

    public function find(Route $route){
        $this->user = User::find($route->getParameter('usuario'));
    }

    public function getIndex()
    {
        return view('nucleo2.index');
    }

    public function getList()
    {
        Session::put('nucleo2_search', Input::has('ok') ? Input::get('search') : (Session::has('nucleo2_search') ? Session::get('nucleo2_search') : ''));
        Session::put('nucleo2_field', Input::has('field') ? Input::get('field') : (Session::has('nucleo2_field') ? Session::get('nucleo2_field') : 'id'));
        Session::put('nucleo2_sort', Input::has('sort') ? Input::get('sort') : (Session::has('nucleo2_sort') ? Session::get('nucleo2_sort') : 'asc'));
                        $profesor = nucleo::profesor();
        $nucleos = profesor::where('id', 'like', Session::get('nucleo2_search') . '%')->orWhere('PRO_PATERNO','like',  Session::get('nucleo2_search') . '%')
->orderBy(Session::get('nucleo2_field'), Session::get('nucleo2_sort'))
        ->paginate(500);

                        $nucleos2 = nucleo::all();



                            //$profesor = Departamento::lists('name', 'id');

                return view('nucleo2.list',compact('nucleos','profesor','nucleos2'));


        //return view('nucleo.list', ['nucleos' => $nucleos]);
    }

    public function getUpdate($id)
    {
        //return view('nucleo.update', ['nucleo' => nucleo::find($id)]);

            $profesor = Profesor::lists('id', 'id');

        
    
        return view('nucleo2.update', ['nucleo' => nucleo::find($id)],compact('profesor'));
    }

    public function postUpdate($id)
    {
        $nucleo = nucleo::find($id);
        

    
            $rules = ['id' => 'required|cl_rut|unique:NUCLEO|unique:DIRECTOR|unique:COLABORADOR|unique:VISITANTE'];

      // if ($nucleo->id != Input::get('id'))
           // $rules += ['id' => 'required|cl_rut|unique:nucleos'];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
                        $nucleo->id = Input::get('id');

      

        $nucleo->save();
        return ['url' => 'nucleo2/list'];
    }

   




    public function getCreate($id)
    {
        //return view('nucleo.update', ['nucleo' => nucleo::find($id)]);

            //$profesor = Profesor::lists('id', 'id');

          $profesor=profesor::where('id', '=', $id)
                ->first();
    
        return view('nucleo2.create', ['nucleo' => profesor::find($id)],compact('profesor'));
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

                       $nucleo = new nucleo();
                             $nucleo->id = Input::get('id');


        $nucleo->save();
        return ['url' => 'nucleo2/list'];
    }

    public function getDelete($id)
    {
        nucleo::destroy($id);
        return Redirect('nucleo2/list');
    }


   public function getShow($id)
    {
        return view('nucleo2.show', ['nucleo' => nucleo::find($id)]);
    }



public function getShow2($id)
    {
$profesor= profesor::paginate();
                    $DEPARTAMENTO = profesor::DEPARTAMENTO();
                     $director=Director::all();    

        $nucleo=Nucleo::all();    

        $visitante=Visitante::all();    

        $colaborador=Colaborador::all();  

        return view('nucleo2.show2',compact('profesor','id','DEPARTAMENTO','director','nucleo','visitante','colaborador'));    }
} 
