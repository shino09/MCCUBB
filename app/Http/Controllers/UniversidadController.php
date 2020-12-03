<?php
namespace Magister\Http\Controllers;

use Magister\Universidad;
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


class UniversidadController extends Controller
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
        return view('universidad.index');
    }

    public function getList()
    {
        Session::put('universidad_search', Input::has('ok') ? Input::get('search') : (Session::has('universidad_search') ? Session::get('universidad_search') : ''));
        Session::put('universidad_field', Input::has('field') ? Input::get('field') : (Session::has('universidad_field') ? Session::get('universidad_field') : 'UNI_NOMBRE'));
        Session::put('universidad_sort', Input::has('sort') ? Input::get('sort') : (Session::has('universidad_sort') ? Session::get('universidad_sort') : 'asc'));
        $universidads = universidad::where('UNI_NOMBRE', 'like', '%' . Session::get('universidad_search') . '%')
           ->orWhere('UNI_CIUDAD','like',  Session::get('universidad_search') . '%')

            ->orderBy(Session::get('universidad_field'), Session::get('universidad_sort'))->paginate(20);






        return view('universidad.list', ['universidads' => $universidads]);
    }

    public function getUpdate($id)
    {
        return view('universidad.update', ['universidad' => universidad::find($id)]);
    }

    public function postUpdate($id)
    {
        $universidad = universidad::find($id);
        


   $messages=[
            'UNI_NOMBRE.unique_with' => 'La convinación [Nombre,Ciudad] ya existe en el sistema',
                        'UNI_CIUDAD.unique_with' => 'La convinación [Nombre,Ciudad] ya existe en el sistema',


        ];




             $validator = Validator::make(Input::all(), [
            "UNI_NOMBRE" => "required|regex:/^[^\s]+(\s*[^\s]+)*$/|unique_with:UNIVERSIDAD,UNI_CIUDAD,$id",
            "UNI_CIUDAD" => "required|regex:/^[^\s]+(\s*[^\s]+)*$/|unique_with:UNIVERSIDAD,UNI_NOMBRE,$id"],$messages);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }

       /*  $rules = ["UNI_CIUDAD" => "required|regex:/^[^\s]+(\s*[^\s]+)*$/|unique_with:UNIVERSIDAD,UNI_NOMBRE,$id"];
       if ($universidad->UNI_NOMBRE != Input::get('UNI_NOMBRE'))
            $rules += ['UNI_NOMBRE' => 'required|regex:/^[^\s]+(\s*[^\s]+)*$/|unique_with:UNIVERSIDAD,UNI_CIUDAD,$id'];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }*/

        $universidad->UNI_NOMBRE = Input::get('UNI_NOMBRE');
        $universidad->UNI_CIUDAD = Input::get('UNI_CIUDAD');




        $universidad->save();
        return ['url' => 'universidad/list'];
    }

    public function getCreate()
    {
        return view('universidad.create');

           // $universidads = universidad::lists('DEP_NOMBRE', 'id');

        //return view('universidad.create',compact('universidads'));
    }

    public function postCreate()
    {

$messages=[
            'UNI_NOMBRE.unique_with' => 'La convinación [Nombre,Ciudad] ya existe en el sistema',
                        'UNI_CIUDAD.unique_with' => 'La convinación [Nombre,Ciudad] ya existe en el sistema',


        ];


        $validator = Validator::make(Input::all(), [
            "UNI_NOMBRE" => "required|regex:/^[^\s]+(\s*[^\s]+)*$/|unique_with:UNIVERSIDAD,UNI_CIUDAD",
'UNI_CIUDAD' => 'required|regex:/^[^\s]+(\s*[^\s]+)*$/|unique_with:UNIVERSIDAD,UNI_NOMBRE' ],$messages);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
        $universidad = new universidad();
        $universidad->UNI_NOMBRE = Input::get('UNI_NOMBRE');
        $universidad->UNI_CIUDAD = Input::get('UNI_CIUDAD');



        $universidad->save();
        return ['url' => 'universidad/list'];
    }

    public function getDelete($id)
    {
        universidad::destroy($id);
        return Redirect('universidad/list');
    }



     public function getShow($id)
    {
        return view('universidad.show', ['universidad' => universidad::find($id)]);
    }

public function getShow2($id)
    {
$universidad= universidad::paginate();

        return view('universidad.show2',compact('universidad','id'));    }
} 
