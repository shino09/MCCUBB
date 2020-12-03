<?php
namespace Magister\Http\Controllers;

use Magister\Alumno;
use Magister\Universidad;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Magister\Asiste;


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

class AlumnoController extends Controller
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
        return view('alumno.index');
    }

    public function getList()
    {
        Session::put('alumno_search', Input::has('ok') ? Input::get('search') : (Session::has('alumno_search') ? Session::get('alumno_search') : ''));
        Session::put('alumno_field', Input::has('field') ? Input::get('field') : (Session::has('alumno_field') ? Session::get('alumno_field') : 'ALU_PATERNO'));
        Session::put('alumno_sort', Input::has('sort') ? Input::get('sort') : (Session::has('alumno_sort') ? Session::get('alumno_sort') : 'asc'));
        $alumnos = alumno::where('id', 'like', Session::get('alumno_search') . '%')

                 ->orWhere('ALU_PATERNO','like',  Session::get('alumno_search') . '%')

            ->orderBy(Session::get('alumno_field'), Session::get('alumno_sort'))->paginate(20);

                
                $universidads = alumno::universidad();



                                return view('alumno.list',compact('alumnos','universidads'));


            
    }

    public function getUpdate($id)
    {
        //return view('alumno.update', ['alumno' => alumno::find($id)]);

           

            $universidads = universidad::lists('UNI_NOMBRE', 'id');


                            //$universidads = universidad::lists('ALU_NOMBRES', 'id');

                               // return view('alumno.update',compact('alumnos','universidads'));
                    return view('alumno.update', ['alumno' => alumno::find($id)],compact('universidads'));

    
        //return view('alumno.update', ['alumno' => alumno::find($id)]);
    }

    public function postUpdate($id)
    {
        $alumno = alumno::find($id);
        

         $rules = ["ALU_NOMBRES" => "required","ALU_PATERNO" => "required","ALU_MATERNO" => "required","ALU_EMAIL" => "required|email|unique:ALUMNO,ALU_EMAIL,".$id, "ALU_TELEFONO" => "required|integer","ALU_PUNTAJE" => "required|integer","ALU_TITULO" => "required","ALU_GRADO" => "required","ALU_ANOINGRESO" => "required","ALU_ESTADO" => "required","UNIVERSIDAD_id" => "required"];
       //if ($alumno->id != Input::get('id'))
         //   $rules += ['id' => 'required|cl_rut|unique:ALUMNO'];
        //$validator = Validator::make(Input::all(), $rules);

          //if ($alumno->id != Input::get('id'))
         //   $rules += ['id' => 'required|cl_rut|unique:ALUMNO'];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
                        $alumno->ALU_EMAIL = Input::get('ALU_EMAIL');

        $alumno->ALU_NOMBRES = Input::get('ALU_NOMBRES');
        $alumno->ALU_PATERNO = Input::get('ALU_PATERNO');
                $alumno->ALU_MATERNO = Input::get('ALU_MATERNO');
                                $alumno->ALU_TELEFONO = Input::get('ALU_TELEFONO');

                $alumno->ALU_PUNTAJE = Input::get('ALU_PUNTAJE');
                                $alumno->ALU_ANOINGRESO = Input::get('ALU_ANOINGRESO');


                $alumno->ALU_TITULO = Input::get('ALU_TITULO');
                                $alumno->ALU_GRADO = Input::get('ALU_GRADO');
                                                                $alumno->ALU_ESTADO = Input::get('ALU_ESTADO');


                                $alumno->UNIVERSIDAD_id = Input::get('UNIVERSIDAD_id');



                   
        $alumno->save();
        return ['url' => 'alumno/list'];
    }

    public function getCreate()
    {

            $universidads = universidad::lists('UNI_NOMBRE', 'id');

    $alumno = Alumno::lists('ALU_PATERNO','id');


                                return view('alumno.create',compact('universidads','alumno'));

    }

    public function postCreate()
    {

           $messages=[
            'id.cl_rut' => 'El RUT ingresado no es Valido',
        ];

        $validator = Validator::make(Input::all(), [
            "id" => "required|regex:/^\S*$/u|cl_rut|unique:ALUMNO",
'ALU_PATERNO' => 'required',
'ALU_EMAIL' => 'required|email|unique:ALUMNO' , "ALU_MATERNO" => "required","ALU_NOMBRES" => "required" ,"ALU_TELEFONO" => "required|integer","ALU_PUNTAJE" => "required|integer","ALU_TITULO" => "required","ALU_ANOINGRESO" => "required","ALU_GRADO" => "required","ALU_ESTADO" => "required","UNIVERSIDAD_id" => "required"],$messages);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
        $alumno = new alumno();
        $alumno->ALU_NOMBRES = Input::get('ALU_NOMBRES');
        $alumno->ALU_PATERNO = Input::get('ALU_PATERNO');
                $alumno->ALU_MATERNO = Input::get('ALU_MATERNO');

        $alumno->id = Input::get('id');


                $alumno->ALU_EMAIL = Input::get('ALU_EMAIL');


                               $alumno->ALU_TELEFONO = Input::get('ALU_TELEFONO');

                $alumno->ALU_PUNTAJE = Input::get('ALU_PUNTAJE');
                                $alumno->ALU_ANOINGRESO = Input::get('ALU_ANOINGRESO');


                $alumno->ALU_TITULO = Input::get('ALU_TITULO');
                                $alumno->ALU_GRADO = Input::get('ALU_GRADO');
                    $alumno->ALU_ESTADO = Input::get('ALU_ESTADO');


                                $alumno->UNIVERSIDAD_id = Input::get('UNIVERSIDAD_id');


        $alumno->save();
        return ['url' => 'alumno/list'];
    }

    public function getDelete($id)
    {
        //alumno::destroy($id);
        $alumno= DB::table('ALUMNO')->where('id',$id)->delete();

        return Redirect('alumno/list');
    }


   public function getShow($id)
    {
        return view('alumno.show', ['alumno' => alumno::find($id)]);
    }


    public function getShow2($id)
    {
$alumno= Alumno::paginate();
                $universidads = alumno::universidad();

        return view('alumno.show2',compact('alumno','id','universidads'));    }

} 
