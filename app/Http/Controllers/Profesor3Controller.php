<?php
namespace Magister\Http\Controllers;

use Magister\Profesor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\validator;
use Magister\Departamento;


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
use Magister\Colaborador;

class Profesor3Controller extends Controller
{


  public function __construct(){
        $this->middleware('auth');
        //$this->middleware('admin');
        $this->beforeFilter('@find',['only' => ['edit','update','destroy']]);
    }

    public function find(Route $route){
        $this->user = User::find($route->getParameter('usuario'));
    }

    public function getIndex()
    {
        return view('profesor3.index');
    }

    public function getList()
    {
        Session::put('profesor3_search', Input::has('ok') ? Input::get('search') : (Session::has('profesor3_search') ? Session::get('profesor3_search') : ''));
        Session::put('profesor3_field', Input::has('field') ? Input::get('field') : (Session::has('profesor3_field') ? Session::get('profesor3_field') : 'PRO_PATERNO'));
        Session::put('profesor3_sort', Input::has('sort') ? Input::get('sort') : (Session::has('profesor3_sort') ? Session::get('profesor3_sort') : 'asc'));
        $PROFESOR = profesor::where('id', 'like', Session::get('profesor3_search') . '%')->orWhere('PRO_PATERNO','like',  Session::get('profesor3_search') . '%')->orderBy(Session::get('profesor3_field'), Session::get('profesor3_sort'))->paginate(20);



                            //$DEPARTAMENTO = Departamento::lists('PRO_NOMBRES', 'id');

               // return view('profesor.list',compact('PROFESOR'));

                    $DEPARTAMENTO = profesor::DEPARTAMENTO();

$profesor2 = DB::table('PROFESOR')
            ->leftJoin('NUCLEO', 'PROFESOR.id', '=', 'NUCLEO.id')
                        ->leftJoin('DIRECTOR', 'PROFESOR.id', '=', 'DIRECTOR.id')

            ->leftJoin('COLABORADOR', 'PROFESOR.id', '=', 'COLABORADOR.id')

            ->leftJoin('VISITANTE', 'PROFESOR.id', '=', 'VISITANTE.id')

               ->whereNull('NUCLEO.id')->whereNull('DIRECTOR.id')->whereNull('COLABORADOR.id')->whereNull('VISITANTE.id')

           //->get();
       ->get(array('PROFESOR.id', 'PROFESOR.PRO_NOMBRES','PROFESOR.PRO_PATERNO','PROFESOR.PRO_MATERNO','PROFESOR.PRO_EMAIL','PROFESOR.PRO_TITULO','PROFESOR.PRO_GRADO','PROFESOR.PRO_TELEFONO','PROFESOR.DEPARTAMENTO_id'));
                            //$DEPARTAMENTO = Departamento::lists('PRO_NOMBRES', 'id');

                return view('profesor3.list',compact('PROFESOR','DEPARTAMENTO','profesor2'));


        //return view('profesor.list', ['PROFESOR' => $PROFESOR]);
    }

    public function getUpdate($id)
    {
        //return view('profesor.update', ['profesor' => profesor::find($id)]);


        
    
        //return view('profesor.update', ['profesor' => profesor::find($id)]);

          $DEPARTAMENTO = Departamento::lists('DEP_NOMBRE', 'id');

        
    
        return view('profesor3.update', ['profesor' => profesor::find($id)],compact('DEPARTAMENTO'));

    }

    public function postUpdate($id)
    {
        $profesor = profesor::find($id);
        

         $rules = ["PRO_NOMBRES" => "required","PRO_TITULO" => "required","PRO_GRADO" => "required","PRO_TELEFONO" => "required","PRO_PATERNO" => "required","PRO_MATERNO" => "required","PRO_EMAIL" => "required|email|unique:PROFESOR","DEPARTAMENTO_id" => "required"];
       if ($profesor->id != Input::get('id'))
            $rules += ['id' => 'required|cl_rut|unique:PROFESOR'];
        $validator = validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
                        $profesor->PRO_EMAIL = Input::get('PRO_EMAIL');

        $profesor->PRO_NOMBRES = Input::get('PRO_NOMBRES');
        $profesor->PRO_PATERNO = Input::get('PRO_PATERNO');
                $profesor->PRO_MATERNO = Input::get('PRO_MATERNO');
                                $profesor->PRO_TITULO = Input::get('PRO_TITULO');

                $profesor->PRO_GRADO = Input::get('PRO_GRADO');

                $profesor->PRO_TELEFONO = Input::get('PRO_TELEFONO');
        $profesor->DEPARTAMENTO_id = Input::get('DEPARTAMENTO_id');




        $profesor->save();
        return ['url' => 'profesor3/list'];
    }

    public function getCreate()
    {
        //return view('profesor.create');



       // return view('profesor.create');

         $DEPARTAMENTO = Departamento::lists('DEP_NOMBRE', 'id');


        return view('profesor3.create',compact('DEPARTAMENTO'));
    }

    public function postCreate()
    {
        $validator = validator::make(Input::all(), [
            "id" => "required|cl_rut|unique:PROFESOR",
'PRO_PATERNO' => 'required',
'PRO_EMAIL' => 'required|email|unique:PROFESOR' , "PRO_MATERNO" => "required","PRO_NOMBRES" => "required","PRO_TITULO" => "required","PRO_GRADO" => "required","PRO_TELEFONO" => "required","DEPARTAMENTO_id" => "required"] );
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
        $profesor = new profesor();
        $profesor->PRO_NOMBRES = Input::get('PRO_NOMBRES');
        $profesor->PRO_PATERNO = Input::get('PRO_PATERNO');
                $profesor->PRO_MATERNO = Input::get('PRO_MATERNO');

        $profesor->id = Input::get('id');


                $profesor->PRO_EMAIL = Input::get('PRO_EMAIL');
           $profesor->PRO_TITULO = Input::get('PRO_TITULO');

                $profesor->PRO_GRADO = Input::get('PRO_GRADO');

                $profesor->PRO_TELEFONO = Input::get('PRO_TELEFONO');
                        $profesor->DEPARTAMENTO_id = Input::get('DEPARTAMENTO_id');


        $profesor->save();
        return ['url' => 'profesor3/list'];
    }

    public function getDelete($id)
    {
        profesor::destroy($id);
        return Redirect('profesor3/list');
    }


   public function getShow($id)
    {
        return view('profesor3.show', ['profesor' => profesor::find($id)]);
    }



public function getShow2($id)
    {
$profesor= profesor::paginate();
                    $DEPARTAMENTO = profesor::DEPARTAMENTO();
                     $director=Director::all();    

        $nucleo=Nucleo::all();    

        $visitante=Visitante::all();    

        $colaborador=Colaborador::all();  

        return view('profesor3.show2',compact('profesor','id','DEPARTAMENTO','director','nucleo','visitante','colaborador'));    }

} 
