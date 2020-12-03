<?php
namespace Magister\Http\Controllers;

use Magister\Visitante;
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

use Magister\Colaborador;


class Visitante2Controller extends Controller
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
        return view('visitante2.index');
    }

    public function getList()
    {
        Session::put('visitante2_search', Input::has('ok') ? Input::get('search') : (Session::has('visitante2_search') ? Session::get('visitante2_search') : ''));
        Session::put('visitante2_field', Input::has('field') ? Input::get('field') : (Session::has('visitante2_field') ? Session::get('visitante2_field') : 'PRO_PATERNO'));
        Session::put('visitante2_sort', Input::has('sort') ? Input::get('sort') : (Session::has('visitante2_sort') ? Session::get('visitante2_sort') : 'asc'));
                        $profesor = visitante::profesor();
        $visitantes = profesor::where('id', 'like', Session::get('visitante2_search') . '%')->orWhere('PRO_PATERNO','like',  Session::get('visitante2_search') . '%')
->orderBy(Session::get('visitante2_field'), Session::get('visitante2_sort'))
        ->paginate(500);

                        $visitantes2 = visitante::all();



                            //$profesor = Departamento::lists('name', 'id');

                return view('visitante2.list',compact('visitantes','profesor','visitantes2'));


        //return view('visitante.list', ['visitantes' => $visitantes]);
    }

    public function getUpdate($id)
    {
        //return view('visitante.update', ['visitante' => visitante::find($id)]);

            $profesor = Profesor::lists('id', 'id');

        
    
        return view('visitante2.update', ['visitante' => visitante::find($id)],compact('profesor'));
    }

    public function postUpdate($id)
    {
        $visitante = visitante::find($id);
        

    
            $rules = ['id' => 'required|cl_rut|unique:NUCLEO|unique:DIRECTOR|unique:COLABORADOR|unique:VISITANTE'];

      // if ($visitante->id != Input::get('id'))
           // $rules += ['id' => 'required|cl_rut|unique:visitantes'];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
                        $visitante->id = Input::get('id');

      

        $visitante->save();
        return ['url' => 'visitante2/list'];
    }

  



    public function getCreate($id)
    {
        //return view('visitante.update', ['visitante' => visitante::find($id)]);

            //$profesor = Profesor::lists('id', 'id');

        
          $profesor=profesor::where('id', '=', $id)
                ->first();
        return view('visitante2.create', ['visitante' => profesor::find($id)],compact('profesor'));
    }

    public function postCreate($id)
    {
         $profesor = profesor::find($id);
        

         


         $validator = Validator::make(Input::all(), [
            "id" => "required|cl_rut|unique:NUCLEO|unique:DIRECTOR|unique:COLABORADOR|unique:VISITANTE",'VIS_UNIVERSIDAD'=> 'required','VIS_PAIS'=> 'required']);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }

                       $visitante = new visitante();
                             $visitante->id = Input::get('id');
  $visitante->id = Input::get('id');
                                                          $visitante->VIS_UNIVERSIDAD = Input::get('VIS_UNIVERSIDAD');

                             $visitante->VIS_PAIS = Input::get('VIS_PAIS');



        $visitante->save();
        return ['url' => 'visitante2/list'];
    }

    public function getDelete($id)
    {
        visitante::destroy($id);
        return Redirect('visitante2/list');
    }


   public function getShow($id)
    {
        return view('visitante2.show', ['visitante' => visitante::find($id)]);
    }

public function getShow2($id)
    {
$profesor= profesor::paginate();
                    $DEPARTAMENTO = profesor::DEPARTAMENTO();
                     $director=Director::all();    

        $nucleo=Nucleo::all();    

        $visitante=Visitante::all();    

        $colaborador=Colaborador::all();  

        return view('visitante2.show2',compact('profesor','id','DEPARTAMENTO','director','nucleo','visitante','colaborador'));    }
} 
