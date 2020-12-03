<?php
namespace Magister\Http\Controllers;

use Magister\Revista;
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


class RevistaController extends Controller
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
        return view('revista.index');
    }

    public function getList()
    {
        Session::put('revista_search', Input::has('ok') ? Input::get('search') : (Session::has('revista_search') ? Session::get('revista_search') : ''));
        Session::put('revista_field', Input::has('field') ? Input::get('field') : (Session::has('revista_field') ? Session::get('revista_field') : 'REV_NOMBRE'));
        Session::put('revista_sort', Input::has('sort') ? Input::get('sort') : (Session::has('revista_sort') ? Session::get('revista_sort') : 'asc'));
        $revistas = revista::where('REV_NOMBRE', 'like', '%' . Session::get('revista_search') . '%')
                ->orWhere('REV_ANO','like',  Session::get('revista__search') . '%')

            ->orderBy(Session::get('revista_field'), Session::get('revista_sort'))->paginate(20);




        return view('revista.list', ['revistas' => $revistas]);
    }

    public function getUpdate($id)
    {
        return view('revista.update', ['revista' => revista::find($id)]);
    }

    public function postUpdate($id)
    {
        $revista = revista::find($id);
        
$messages=[
            'REV_NOMBRE.unique_with' => 'La convinación [Nombre,Año] ya existe en el sistema',

            'REV_ANO.unique_with' => 'La convinación [Nombre,Año] ya existe en el sistema',

        ];



           $validator = Validator::make(Input::all(), [
            "REV_NOMBRE" => "required|regex:/^[^\s]+(\s*[^\s]+)*$/|unique_with:REVISTA,REV_ANO,$id",
"REV_ANO" => "required|integer|unique_with:REVISTA,REV_NOMBRE,$id"],$messages);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
         /*$rules = ["REV_DESCRIPCION" => "required","REV_ANO" => "required|integer|unique_with:REVISTA,REV_NOMBRE,$id"];
       if ($revista->REV_NOMBRE != Input::get('REV_NOMBRE'))
            $rules += ['REV_NOMBRE' => 'required|regex:/^[^\s]+(\s*[^\s]+)*$/|unique_with:REVISTA,REV_ANO,$id'];
        $validator = Validator::make(Input::all(), $rules,$messages);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }*/

        $revista->REV_NOMBRE = Input::get('REV_NOMBRE');
        $revista->REV_DESCRIPCION = Input::get('REV_DESCRIPCION');
                $revista->REV_ANO = Input::get('REV_ANO');



        $revista->save();
        return ['url' => 'revista/list'];
    }

    public function getCreate()
    {
        return view('revista.create');

           // $revistas = revista::lists('DEP_NOMBRE', 'id');

        //return view('revista.create',compact('revistas'));
    }

    public function postCreate()
    {
        $messages=[
            'REV_NOMBRE.unique_with' => 'La convinación [Nombre,Año] ya existe en el sistema',

            'REV_ANO.unique_with' => 'La convinación [Nombre,Año] ya existe en el sistema',

        ];

        $validator = Validator::make(Input::all(), [
            "REV_NOMBRE" => "required|regex:/^[^\s]+(\s*[^\s]+)*$/|unique_with:REVISTA,REV_ANO",
'REV_DESCRIPCION' => 'required' ,"REV_ANO" => "required|integer|unique_with:REVISTA,REV_NOMBRE"],$messages);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
        $revista = new revista();
        $revista->REV_NOMBRE = Input::get('REV_NOMBRE');
        $revista->REV_DESCRIPCION = Input::get('REV_DESCRIPCION');
          $revista->REV_ANO = Input::get('REV_ANO');


        $revista->save();
        return ['url' => 'revista/list'];
    }

    public function getDelete($id)
    {
        revista::destroy($id);
        return Redirect('revista/list');
    }



     public function getShow($id)
    {
        return view('revista.show', ['revista' => revista::find($id)]);
    }
    public function getShow2($id)
    {
$revista= revista::paginate();

        return view('revista.show2',compact('revista','id'));    }


} 
