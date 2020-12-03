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

class ProfesorController extends Controller
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
        return view('profesor.index');
    }

    public function getList()
    {
        Session::put('profesor_search', Input::has('ok') ? Input::get('search') : (Session::has('profesor_search') ? Session::get('profesor_search') : ''));
        Session::put('profesor_field', Input::has('field') ? Input::get('field') : (Session::has('profesor_field') ? Session::get('profesor_field') : 'PRO_PATERNO'));
        Session::put('profesor_sort', Input::has('sort') ? Input::get('sort') : (Session::has('profesor_sort') ? Session::get('profesor_sort') : 'asc'));
        $PROFESOR = profesor::where('id', 'like', Session::get('profesor_search') . '%')->orWhere('PRO_PATERNO','like',  Session::get('profesor_search') . '%')->orderBy(Session::get('profesor_field'), Session::get('profesor_sort'))->paginate(20);



                            //$DEPARTAMENTO = Departamento::lists('PRO_NOMBRES', 'id');

               // return view('profesor.list',compact('PROFESOR'));

                    $DEPARTAMENTO = profesor::DEPARTAMENTO();


                            //$DEPARTAMENTO = Departamento::lists('PRO_NOMBRES', 'id');

                return view('profesor.list',compact('PROFESOR','DEPARTAMENTO'));


        //return view('profesor.list', ['PROFESOR' => $PROFESOR]);
    }

    public function getUpdate($id)
    {
        //return view('profesor.update', ['profesor' => profesor::find($id)]);


        
    
        //return view('profesor.update', ['profesor' => profesor::find($id)]);

          $DEPARTAMENTO = Departamento::lists('DEP_NOMBRE', 'id');

        
    
        return view('profesor.update', ['profesor' => profesor::find($id)],compact('DEPARTAMENTO'));

    }

    public function postUpdate($id)
    {
        $profesor = profesor::find($id);
        

         $rules = ["PRO_NOMBRES" => "required","PRO_TITULO" => "required","PRO_GRADO" => "required","PRO_TELEFONO" => "required","PRO_PATERNO" => "required","PRO_MATERNO" => "required","PRO_EMAIL" => "required|email|unique:PROFESOR,PRO_EMAIL,".$id,"DEPARTAMENTO_id" => "required"];
       //if ($profesor->id != Input::get('id'))
            //$rules += ['id' => 'required|cl_rut|unique:PROFESOR'];
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
        return ['url' => 'profesor/list'];
    }

    public function getCreate()
    {
        //return view('profesor.create');



       // return view('profesor.create');

         $DEPARTAMENTO = Departamento::lists('DEP_NOMBRE', 'id');


        return view('profesor.create',compact('DEPARTAMENTO'));
    }

    public function postCreate()
    {

          $messages=[
            'id.cl_rut' => 'El RUT ingresado no es Valido',
        ];

        $validator = validator::make(Input::all(), [
            "id" => "required|regex:/^\S*$/u|cl_rut|unique:PROFESOR",
'PRO_PATERNO' => 'required',
'PRO_EMAIL' => 'required|email|unique:PROFESOR' , "PRO_MATERNO" => "required","PRO_NOMBRES" => "required","PRO_TITULO" => "required","PRO_GRADO" => "required","PRO_TELEFONO" => "required","DEPARTAMENTO_id" => "required"] ,$messages);
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
        return ['url' => 'profesor/list'];
    }

    public function getDelete($id)
    {
        //profesor::destroy($id);
$profesor= DB::table('PROFESOR')->where('id',$id)->delete();

        return Redirect('profesor/list');
    }


   public function getShow($id)
    {
        return view('profesor.show', ['profesor' => profesor::find($id)]);
    }



public function getShow2($id)
    {
$profesor= profesor::paginate();
                    $DEPARTAMENTO = profesor::DEPARTAMENTO();
                     $director=Director::all();    

        $nucleo=Nucleo::all();    

        $visitante=Visitante::all();    

        $colaborador=Colaborador::all();  

        return view('profesor.show2',compact('profesor','id','DEPARTAMENTO','director','nucleo','visitante','colaborador'));    }

} 
