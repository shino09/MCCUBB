<?php
namespace Magister\Http\Controllers;

use Magister\Congreso;
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


class CongresoController extends Controller
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
        return view('congreso.index');
    }

    public function getList()
    {
        Session::put('congreso_search', Input::has('ok') ? Input::get('search') : (Session::has('congreso_search') ? Session::get('congreso_search') : ''));
        Session::put('congreso_field', Input::has('field') ? Input::get('field') : (Session::has('congreso_field') ? Session::get('congreso_field') : 'CON_NOMBRE'));
        Session::put('congreso_sort', Input::has('sort') ? Input::get('sort') : (Session::has('congreso_sort') ? Session::get('congreso_sort') : 'asc'));
        $congresos = congreso::where('CON_NOMBRE', 'like', '%' . Session::get('congreso_search') . '%')
                    ->orWhere('CON_CIUDAD','like',  Session::get('congreso_search') . '%')

            ->orderBy(Session::get('congreso_field'), Session::get('congreso_sort'))->paginate(20);




        return view('congreso.list', ['congresos' => $congresos]);
    }

    public function getUpdate($id)
    {
        return view('congreso.update', ['congreso' => congreso::find($id)]);
    }

    public function postUpdate($id)
    {
        $congreso = congreso::find($id);
         $messages=[
            'CON_NOMBRE.unique_with' => 'La convinación [Nombre,Cuidad,Año] ya existe en el sistema',
                        'CON_CIUDAD.unique_with' => 'La convinación [Nombre,Cuidad,Año] ya existe en el sistema',

            'CON_ANO.unique_with' => 'La convinación [Nombre,Cuidad,Año] ya existe en el sistema',

        ];



              $validator = Validator::make(Input::all(), [
            "CON_NOMBRE" => "required|regex:/^[^\s]+(\s*[^\s]+)*$/|unique_with:CONGRESO,CON_ANO,CON_CIUDAD,$id",
"CON_ANO" => "required|integer|unique_with:CONGRESO,CON_NOMBRE,CON_CIUDAD,$id",
"CON_CIUDAD","CON_CIUDAD" => "required|regex:/^[^\s]+(\s*[^\s]+)*$/|unique_with:CONGRESO,CON_NOMBRE,CON_ANO,$id"],$messages);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }

       /*  $rules = ["CON_ANO" => "required|integer|unique_with:CONGRESO,CON_CIUDAD,CON_NOMBRE,$id",
            "CON_CIUDAD" => "required|regex:/^[^\s]+(\s*[^\s]+)*$/|unique_with:CONGRESO,CON_NOMBRE,CON_ANO,$id"];
       if ($congreso->CON_NOMBRE != Input::get('CON_NOMBRE'))
            $rules += ["CON_NOMBRE" => "required|regex:/^[^\s]+(\s*[^\s]+)*$/|unique_with:CONGRESO,CON_CIUDAD,CON_ANO,$id"];
        $validator = Validator::make(Input::all(), $rules,$messages);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }*/

        $congreso->CON_NOMBRE = Input::get('CON_NOMBRE');
        $congreso->CON_CIUDAD = Input::get('CON_CIUDAD');
                $congreso->CON_ANO = Input::get('CON_ANO');



        $congreso->save();
        return ['url' => 'congreso/list'];
    }

    public function getCreate()
    {
        return view('congreso.create');

           // $congresos = congreso::lists('DEP_NOMBRE', 'id');

        //return view('congreso.create',compact('congresos'));
    }

    public function postCreate()
    {
          $messages=[
            'CON_NOMBRE.unique_with' => 'La convinación [Nombre,Cuidad,Año] ya existe en el sistema',
                        'CON_CIUDAD.unique_with' => 'La convinación [Nombre,Cuidad,Año] ya existe en el sistema',

            'CON_ANO.unique_with' => 'La convinación [Nombre,Cuidad,Año] ya existe en el sistema',

        ];

        $validator = Validator::make(Input::all(), [
            "CON_NOMBRE" => "required|regex:/^[^\s]+(\s*[^\s]+)*$/|unique_with:CONGRESO,CON_CIUDAD,CON_ANO",
            "CON_CIUDAD" => "required|regex:/^[^\s]+(\s*[^\s]+)*$/|unique_with:CONGRESO,CON_NOMBRE,CON_ANO",
            "CON_ANO" =>    "required|integer|unique_with:CONGRESO,CON_CIUDAD,CON_NOMBRE"],$messages);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
        $congreso = new congreso();
        $congreso->CON_NOMBRE = Input::get('CON_NOMBRE');
        $congreso->CON_CIUDAD = Input::get('CON_CIUDAD');
          $congreso->CON_ANO = Input::get('CON_ANO');


        $congreso->save();
        return ['url' => 'congreso/list'];
    }

    public function getDelete($id)
    {
        congreso::destroy($id);
        return Redirect('congreso/list');
    }



     public function getShow($id)
    {
        return view('congreso.show', ['congreso' => congreso::find($id)]);
    }


    public function getShow2($id)
    {
$congreso= congreso::paginate();

        return view('congreso.show2',compact('congreso','id'));    }

} 
