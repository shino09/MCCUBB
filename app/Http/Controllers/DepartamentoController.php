<?php
namespace Magister\Http\Controllers;

use Magister\Departamento;
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


class DepartamentoController extends Controller
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
        return view('departamento.index');
    }

    public function getList()
    {
        Session::put('departamento_search', Input::has('ok') ? Input::get('search') : (Session::has('departamento_search') ? Session::get('departamento_search') : ''));
        Session::put('departamento_field', Input::has('field') ? Input::get('field') : (Session::has('departamento_field') ? Session::get('departamento_field') : 'DEP_NOMBRE'));
        Session::put('departamento_sort', Input::has('sort') ? Input::get('sort') : (Session::has('departamento_sort') ? Session::get('departamento_sort') : 'asc'));
        $DEPARTAMENTO = departamento::where('DEP_NOMBRE', 'like', '%' . Session::get('departamento_search') . '%')
         //  ->orWhere('DEP_FACULTAD','like',  Session::get('departamento_search') . '%')



            ->orderBy(Session::get('departamento_field'), Session::get('departamento_sort'))->paginate(20);




        return view('departamento.list', ['DEPARTAMENTO' => $DEPARTAMENTO]);
    }

    public function getUpdate($id)
    {
        return view('departamento.update', ['departamento' => departamento::find($id)]);
    }

    public function postUpdate($id)
    {
        $departamento = departamento::find($id);
        
 $messages=[
            'DEP_NOMBRE.unique_with' => 'La convinación [Nombre,Facultad] ya existe en el sistema',
                        'DEP_FACULTAD.unique_with' => 'La convinación [Nombre,Facultad] ya existe en el sistema',

        ];



     $validator = Validator::make(Input::all(), [
            "DEP_NOMBRE" => "required|regex:/^[^\s]+(\s*[^\s]+)*$/|unique_with:DEPARTAMENTO,DEP_FACULTAD,$id",
            "DEP_FACULTAD" => "required|regex:/^[^\s]+(\s*[^\s]+)*$/|unique_with:DEPARTAMENTO,DEP_NOMBRE,$id"],$messages);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }

         /*$rules = ["DEP_FACULTAD" => "required|regex:/^[^\s]+(\s*[^\s]+)*$/"];
       if ($departamento->DEP_NOMBRE != Input::get('DEP_NOMBRE'))
            $rules += ['DEP_NOMBRE' => 'required|regex:/^[^\s]+(\s*[^\s]+)*$/|unique:DEPARTAMENTO,DEP_NOMBRE,'.$id];
        $validator = validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }*/

        $departamento->DEP_NOMBRE = Input::get('DEP_NOMBRE');
        $departamento->DEP_FACULTAD = Input::get('DEP_FACULTAD');

        $departamento->save();
        return ['url' => 'departamento/list'];
    }

    public function getCreate()
    {
        return view('departamento.create');

           // $DEPARTAMENTO = Departamento::lists('DEP_NOMBRE', 'id');

        //return view('departamento.create',compact('DEPARTAMENTO'));
    }

    public function postCreate()
    {
        $messages=[
            'DEP_NOMBRE.unique_with' => 'La convinación [Nombre,Facultad] ya existe en el sistema',
                        'DEP_FACULTAD.unique_with' => 'La convinación [Nombre,Facultad] ya existe en el sistema',

        ];

    
        $validator = validator::make(Input::all(), [
            "DEP_NOMBRE" => "required|regex:/^[^\s]+(\s*[^\s]+)*$/|unique_with:DEPARTAMENTO,DEP_FACULTAD",
'DEP_FACULTAD' => 'required|regex:/^[^\s]+(\s*[^\s]+)*$/|unique_with:DEPARTAMENTO,DEP_NOMBRE' ]);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
        $departamento = new departamento();
        $departamento->DEP_NOMBRE = Input::get('DEP_NOMBRE');
        $departamento->DEP_FACULTAD = Input::get('DEP_FACULTAD');

        $departamento->save();
        return ['url' => 'departamento/list'];
    }

    public function getDelete($id)
    {
        departamento::destroy($id);
        return Redirect('departamento/list');
    }



     public function getShow($id)
    {
        return view('departamento.show', ['departamento' => departamento::find($id)]);
    }



 public function getShow2($id)
    {
$departamento= departamento::paginate();

        return view('departamento.show2',compact('departamento','id'));    }

} 
