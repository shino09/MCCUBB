<?php
namespace Magister\Http\Controllers;

use Magister\Director;
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


use Magister\Nucleo;

use Magister\Visitante;
use Magister\Colaborador;

class Director2Controller extends Controller
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
        return view('director2.index');
    }

    public function getList()
    {
        Session::put('director2_search', Input::has('ok') ? Input::get('search') : (Session::has('director2_search') ? Session::get('director2_search') : ''));
        Session::put('director2_field', Input::has('field') ? Input::get('field') : (Session::has('director2_field') ? Session::get('director2_field') : 'id'));
        Session::put('director2_sort', Input::has('sort') ? Input::get('sort') : (Session::has('director2_sort') ? Session::get('director2_sort') : 'asc'));
                        $profesor = director::profesor();
        $directors = profesor::where('id', 'like', Session::get('director2_search') . '%')->orWhere('PRO_PATERNO','like',  Session::get('director2_search') . '%')
->orderBy(Session::get('director2_field'), Session::get('director2_sort'))
        ->paginate(500);

                        $directors2 = director::all();



                            //$profesor = Departamento::lists('name', 'id');

                return view('director2.list',compact('directors','profesor','directors2'));


        //return view('director.list', ['directors' => $directors]);
    }

    public function getUpdate($id)
    {
        //return view('director.update', ['director' => director::find($id)]);

            $profesor = Profesor::lists('id', 'id');

        
    
        return view('director2.update', ['director' => director::find($id)],compact('profesor'));
    }

    public function postUpdate($id)
    {
        $director = director::find($id);
        

    
            $rules = ['id' => 'required|cl_rut|unique:NUCLEO|unique:DIRECTOR|unique:COLABORADOR|unique:VISITANTE'];

      // if ($director->id != Input::get('id'))
           // $rules += ['id' => 'required|cl_rut|unique:directors'];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
                        $director->id = Input::get('id');

      

        $director->save();
        return ['url' => 'director2/list'];
    }

 



    public function getCreate($id)
    {
        //return view('director.update', ['director' => director::find($id)]);

           // $profesor = Profesor::lists('id', 'id');

        $profesor=profesor::where('id', '=', $id)
                ->first();
    
        return view('director2.create', ['director' => profesor::find($id)],compact('profesor'));

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

                       $director = new director();
                             $director->id = Input::get('id');


        $director->save();
        return ['url' => 'director2/list'];
    }

    public function getDelete($id)
    {
        director::destroy($id);
        return Redirect('director2/list');
    }


   public function getShow($id)
    {
        return view('director2.show', ['director' => director::find($id)]);
    }


public function getShow2($id)
    {
$profesor= profesor::paginate();
                    $DEPARTAMENTO = profesor::DEPARTAMENTO();
                     $director=Director::all();    

        $nucleo=Nucleo::all();    

        $visitante=Visitante::all();    

        $colaborador=Colaborador::all();  

        return view('director2.show2',compact('profesor','id','DEPARTAMENTO','director','nucleo','visitante','colaborador'));    }
} 
