<?php
namespace Magister\Http\Controllers;

use Magister\Trabajo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use Magister\Http\Requests;
use Magister\Http\Requests\UserCreateRequest;
use Magister\Http\Requests\UserUpdateRequest;
use Magister\Http\Controllers\Controller;
use Magister\User;
use Redirect;
use Illuminate\Routing\Route;


class TrabajoController extends Controller
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
        return view('trabajo.index');
    }

    public function getList()
    {
        Session::put('trabajo_search', Input::has('ok') ? Input::get('search') : (Session::has('trabajo_search') ? Session::get('trabajo_search') : ''));
        Session::put('trabajo_field', Input::has('field') ? Input::get('field') : (Session::has('trabajo_field') ? Session::get('trabajo_field') : 'TRA_NOMBRE'));
        Session::put('trabajo_sort', Input::has('sort') ? Input::get('sort') : (Session::has('trabajo_sort') ? Session::get('trabajo_sort') : 'asc'));
        $trabajos = trabajo::where('TRA_NOMBRE', 'like', '%' . Session::get('trabajo_search') . '%')
            ->orWhere('TRA_EMPRESA','like',  Session::get('trabajo_search') . '%')

            ->orderBy(Session::get('trabajo_field'), Session::get('trabajo_sort'))->paginate(20);




        return view('trabajo.list', ['trabajos' => $trabajos]);
    }

    public function getUpdate($id)
    {
        return view('trabajo.update', ['trabajo' => trabajo::find($id)]);
    }

    public function postUpdate($id)
    {
        $trabajo = trabajo::find($id);
        
        $messages=[
            'TRA_NOMBRE.unique_with' => 'La convinación [Nombre,Empresa,Ciudad] ya existe en el sistema',
                        'TRA_CIUDAD.unique_with' => 'La convinación [Nombre,Empresa,Ciudad] ya existe en el sistema',

            'TRA_EMPRESA.unique_with' => 'La convinación [Nombre,Empresa,Ciudad] ya existe en el sistema',

        ];




             $validator = Validator::make(Input::all(), [
            "TRA_NOMBRE" => "required|regex:/^[^\s]+(\s*[^\s]+)*$/|unique_with:TRABAJO,TRA_EMPRESA,TRA_CIUDAD,$id",
"TRA_EMPRESA" => "required|regex:/^[^\s]+(\s*[^\s]+)*$/|unique_with:TRABAJO,TRA_NOMBRE,TRA_CIUDAD,$id",
"TRA_CIUDAD","TRA_CIUDAD" => "required|regex:/^[^\s]+(\s*[^\s]+)*$/|unique_with:TRABAJO,TRA_NOMBRE,TRA_EMPRESA,$id"],$messages);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }

/*         $rules = [ 'TRA_NOMBRE' => 'required|regex:/^[^\s]+(\s*[^\s]+)*$/|unique_with:TRABAJO,TRA_CIUDAD,TRA_EMPRESA,$id',
                    "TRA_CIUDAD" => "required|regex:/^[^\s]+(\s*[^\s]+)*$/|unique_with:TRABAJO,TRA_NOMBRE,TRA_EMPRESA,$id",
                    "TRA_EMPRESA" => "required|regex:/^[^\s]+(\s*[^\s]+)*$/|unique_with:TRABAJO,TRA_NOMBRE,TRA_CIUDAD,$id"];
    
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }*/

        $trabajo->TRA_NOMBRE = Input::get('TRA_NOMBRE');
        $trabajo->TRA_CIUDAD = Input::get('TRA_CIUDAD');
                $trabajo->TRA_EMPRESA = Input::get('TRA_EMPRESA');



        $trabajo->save();
        return ['url' => 'trabajo/list'];
    }

    public function getCreate()
    {
        return view('trabajo.create');

           // $trabajos = trabajo::lists('DEP_NOMBRE', 'id');

        //return view('trabajo.create',compact('trabajos'));
    }

    public function postCreate()
    {
        $validator = Validator::make(Input::all(), [
            "TRA_EMPRESA" => "required|regex:/^[^\s]+(\s*[^\s]+)*$/|unique_with:TRABAJO,TRA_CIUDAD,TRA_NOMBRE",
'TRA_CIUDAD' => 'required|regex:/^[^\s]+(\s*[^\s]+)*$/|unique_with:TRABAJO,TRA_NOMBRE,TRA_EMPRESA' ,
"TRA_NOMBRE" => "required|regex:/^[^\s]+(\s*[^\s]+)*$/|unique_with:TRABAJO,TRA_CIUDAD,TRA_EMPRESA"]);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
        $trabajo = new trabajo();
        $trabajo->TRA_NOMBRE = Input::get('TRA_NOMBRE');
        $trabajo->TRA_CIUDAD = Input::get('TRA_CIUDAD');
          $trabajo->TRA_EMPRESA = Input::get('TRA_EMPRESA');


        $trabajo->save();
        return ['url' => 'trabajo/list'];
    }

    public function getDelete($id)
    {
        trabajo::destroy($id);
        return Redirect('trabajo/list');
    }



     public function getShow($id)
    {
        return view('trabajo.show', ['trabajo' => trabajo::find($id)]);
    }

 public function getShow2($id)
    {
$trabajo= trabajo::paginate();

        return view('trabajo.show2',compact('trabajo','id'));    }


} 
