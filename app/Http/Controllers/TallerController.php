<?php
namespace Magister\Http\Controllers;

use Magister\Taller;
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


class TallerController extends Controller
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
        return view('taller.index');
    }

    public function getList()
    {
        Session::put('taller_search', Input::has('ok') ? Input::get('search') : (Session::has('taller_search') ? Session::get('taller_search') : ''));
        Session::put('taller_field', Input::has('field') ? Input::get('field') : (Session::has('taller_field') ? Session::get('taller_field') : 'TAL_NOMBRE'));
        Session::put('taller_sort', Input::has('sort') ? Input::get('sort') : (Session::has('taller_sort') ? Session::get('taller_sort') : 'asc'));
        $tallers = taller::where('TAL_NOMBRE', 'like', '%' . Session::get('taller_search') . '%')
                                                    ->orWhere('TAL_ANO','like',  Session::get('taller__search') . '%')

            ->orderBy(Session::get('taller_field'), Session::get('taller_sort'))->paginate(20);




        return view('taller.list', ['tallers' => $tallers]);
    }

    public function getUpdate($id)
    {
        return view('taller.update', ['taller' => taller::find($id)]);
    }

    public function postUpdate($id)
    {
        $taller = taller::find($id);
         $messages=[
            'TAL_NOMBRE.unique_with' => 'La convinación [Nombre,Año] ya existe en el sistema',

            'TAL_ANO.unique_with' => 'La convinación [Nombre,Año] ya existe en el sistema',

        ];

           $validator = Validator::make(Input::all(), [
            "TAL_NOMBRE" => "required|regex:/^[^\s]+(\s*[^\s]+)*$/|unique_with:TALLER,TAL_ANO,$id",
"TAL_ANO" => "required|integer|unique_with:TALLER,TAL_NOMBRE,$id"],$messages);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }

        $taller->TAL_NOMBRE = Input::get('TAL_NOMBRE');
                $taller->TAL_ANO = Input::get('TAL_ANO');



        $taller->save();
        return ['url' => 'taller/list'];
    }

    public function getCreate()
    {
        return view('taller.create');

           // $tallers = taller::lists('DEP_NOMBRE', 'id');

        //return view('taller.create',compact('tallers'));
    }

    public function postCreate()
    {
         $messages=[
            'TAL_NOMBRE.unique_with' => 'La convinación [Nombre,Año] ya existe en el sistema',

            'TAL_ANO.unique_with' => 'La convinación [Nombre,Año] ya existe en el sistema',

        ];
        $validator = Validator::make(Input::all(), [
            "TAL_NOMBRE" => "required|regex:/^[^\s]+(\s*[^\s]+)*$/|unique_with:TALLER,TAL_ANO","TAL_ANO" => "required|integer|unique_with:TALLER,TAL_NOMBRE"],$messages);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
        $taller = new taller();
        $taller->TAL_NOMBRE = Input::get('TAL_NOMBRE');
          $taller->TAL_ANO = Input::get('TAL_ANO');


        $taller->save();
        return ['url' => 'taller/list'];
    }

    public function getDelete($id)
    {
        taller::destroy($id);
        return Redirect('taller/list');
    }



     public function getShow($id)
    {
        return view('taller.show', ['taller' => taller::find($id)]);
    }
  public function getShow2($id)
    {
$taller= taller::paginate();

        return view('taller.show2',compact('taller','id'));    }


} 
