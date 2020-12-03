<?php
namespace Magister\Http\Controllers;

use Magister\Beneficio;
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


class BeneficioController extends Controller
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
        return view('beneficio.index');
    }

    public function getList()
    {
        Session::put('beneficio_search', Input::has('ok') ? Input::get('search') : (Session::has('beneficio_search') ? Session::get('beneficio_search') : ''));
        Session::put('beneficio_field', Input::has('field') ? Input::get('field') : (Session::has('beneficio_field') ? Session::get('beneficio_field') : 'BEN_NOMBRE'));
        Session::put('beneficio_sort', Input::has('sort') ? Input::get('sort') : (Session::has('beneficio_sort') ? Session::get('beneficio_sort') : 'asc'));
        $beneficios = beneficio::where('BEN_NOMBRE', 'like', '%' . Session::get('beneficio_search') . '%')
            ->orderBy(Session::get('beneficio_field'), Session::get('beneficio_sort'))->paginate(20);




        return view('beneficio.list', ['beneficios' => $beneficios]);
    }

    public function getUpdate($id)
    {
        return view('beneficio.update', ['beneficio' => beneficio::find($id)]);
    }

    public function postUpdate($id)
    {
        $beneficio = beneficio::find($id);
        
        $messages=[
            'BEN_NOMBRE.unique' => 'Este  Nombre de Beneficio  ya existe en el sistema',


        ];




             $validator = Validator::make(Input::all(), [
            'BEN_NOMBRE' => 'required|regex:/^[^\s]+(\s*[^\s]+)*$/|unique:BENEFICIO,BEN_NOMBRE,'.$id,'BEN_DESCRIPCION' => 'required' ,
],$messages);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }

  

        $beneficio->BEN_NOMBRE = Input::get('BEN_NOMBRE');
        $beneficio->BEN_DESCRIPCION = Input::get('BEN_DESCRIPCION');



        $beneficio->save();
        return ['url' => 'beneficio/list'];
    }

    public function getCreate()
    {
        return view('beneficio.create');

           // $beneficios = beneficio::lists('DEP_NOMBRE', 'id');

        //return view('beneficio.create',compact('beneficios'));
    }

    public function postCreate()
    {

         $messages=[
            'BEN_NOMBRE.unique' => 'Este  Nombre de Beneficio  ya existe en el sistema',


        ];

        $validator = Validator::make(Input::all(), [
            "BEN_NOMBRE" => "required|regex:/^[^\s]+(\s*[^\s]+)*$/|unique:BENEFICIO",
'BEN_DESCRIPCION' => 'required' ],$messages);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
        $beneficio = new beneficio();
        $beneficio->BEN_NOMBRE = Input::get('BEN_NOMBRE');
        $beneficio->BEN_DESCRIPCION = Input::get('BEN_DESCRIPCION');


        $beneficio->save();
        return ['url' => 'beneficio/list'];
    }

    public function getDelete($id)
    {
        beneficio::destroy($id);
        return Redirect('beneficio/list');
    }



  


    public function getShow2($id)
    {
$beneficio= beneficio::paginate();

        return view('beneficio.show2',compact('beneficio','id'));    }

} 
