<?php
namespace Magister\Http\Controllers;

use Magister\Solicitud;
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


class SolicitudController extends Controller
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
        return view('solicitud.index');
    }

    public function getList()
    {
        Session::put('solicitud_search', Input::has('ok') ? Input::get('search') : (Session::has('solicitud_search') ? Session::get('solicitud_search') : ''));
        Session::put('solicitud_field', Input::has('field') ? Input::get('field') : (Session::has('solicitud_field') ? Session::get('solicitud_field') : 'SOL_NOMBRE'));
        Session::put('solicitud_sort', Input::has('sort') ? Input::get('sort') : (Session::has('solicitud_sort') ? Session::get('solicitud_sort') : 'asc'));
        $solicituds = solicitud::where('SOL_NOMBRE', 'like', '%' . Session::get('solicitud_search') . '%')
                                    ->orWhere('SOL_ANO','like',  Session::get('solicitud_search') . '%')

            ->orderBy(Session::get('solicitud_field'), Session::get('solicitud_sort'))->paginate(20);




        return view('solicitud.list', ['solicituds' => $solicituds]);
    }

    public function getUpdate($id)
    {
        return view('solicitud.update', ['solicitud' => solicitud::find($id)]);
    }

    public function postUpdate($id)
    {
        $solicitud = solicitud::find($id);
        
$messages=[
            'SOL_NOMBRE.unique_with' => 'La convinación [Nombre,Semestre,Año] ya existe en el sistema',
                        'SOL_SEMESTRE.unique_with' => 'La convinación [Nombre,Semestre,Año] ya existe en el sistema',

            'SOL_ANO.unique_with' => 'La convinación [Nombre,Semestre,Año] ya existe en el sistema',

        ];




             $validator = Validator::make(Input::all(), [
            "SOL_NOMBRE" => "required|regex:/^[^\s]+(\s*[^\s]+)*$/|unique_with:SOLICITUD,SOL_ANO,SOL_SEMESTRE,$id",
'SOL_DESCRIPCION' => 'required' ,
"SOL_ANO" => "required|integer|unique_with:SOLICITUD,SOL_NOMBRE,SOL_SEMESTRE,$id",
"SOL_SEMESTRE","SOL_SEMESTRE" => "required|integer|unique_with:SOLICITUD,SOL_NOMBRE,SOL_ANO,$id"],$messages);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }

        /* $rules = ["SOL_SEMESTRE" => "required|integer|unique_with:SOLICITUD,SOL_NOMBRE,SOL_ANO,$id",
                    "SOL_ANO" => "required|integer|unique_with:SOLICITUD,SOL_NOMBRE,SOL_SEMESTRE,$id",
                    "SOL_DESCRIPCION" => "required"];
       if ($solicitud->SOL_NOMBRE != Input::get('SOL_NOMBRE'))
            $rules += ['SOL_NOMBRE' => 'required|regex:/^[^\s]+(\s*[^\s]+)*$/|unique_with:SOLICITUD,SOL_SEMESTRE,SOL_ANO,$id'];
        $validator = Validator::make(Input::all(), $rules,$messages);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }*/

        $solicitud->SOL_NOMBRE = Input::get('SOL_NOMBRE');
        $solicitud->SOL_SEMESTRE = Input::get('SOL_SEMESTRE');
                $solicitud->SOL_ANO = Input::get('SOL_ANO');

        $solicitud->SOL_DESCRIPCION = Input::get('SOL_DESCRIPCION');


        $solicitud->save();
        return ['url' => 'solicitud/list'];
    }

    public function getCreate()
    {
        return view('solicitud.create');

           // $solicituds = solicitud::lists('DEP_NOMBRE', 'id');

        //return view('solicitud.create',compact('solicituds'));
    }

    public function postCreate()
    {
         $messages=[
            'SOL_NOMBRE.unique_with' => 'La convinación [Nombre,Semestre,Año] ya existe en el sistema',
                        'SOL_SEMESTRE.unique_with' => 'La convinación [Nombre,Semestre,Año] ya existe en el sistema',

            'SOL_ANO.unique_with' => 'La convinación [Nombre,Semestre,Año] ya existe en el sistema',

        ];
        $validator = Validator::make(Input::all(), [
            "SOL_NOMBRE" => "required|regex:/^[^\s]+(\s*[^\s]+)*$/|unique_with:SOLICITUD,SOL_SEMESTRE,SOL_ANO",
            "SOL_DESCRIPCION" => "required",
            'SOL_SEMESTRE' => 'required|integer|unique_with:SOLICITUD,SOL_NOMBRE,SOL_ANO' ,
            "SOL_ANO" => "required|integer|unique_with:SOLICITUD,SOL_NOMBRE,SOL_SEMESTRE"],$messages);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
        $solicitud = new solicitud();
        $solicitud->SOL_NOMBRE = Input::get('SOL_NOMBRE');
        $solicitud->SOL_SEMESTRE = Input::get('SOL_SEMESTRE');
          $solicitud->SOL_ANO = Input::get('SOL_ANO');

        $solicitud->SOL_DESCRIPCION = Input::get('SOL_DESCRIPCION');

        $solicitud->save();
        return ['url' => 'solicitud/list'];
    }

    public function getDelete($id)
    {
        solicitud::destroy($id);
        return Redirect('solicitud/list');
    }



     public function getShow($id)
    {
        return view('solicitud.show', ['solicitud' => solicitud::find($id)]);
    }

      public function getShow2($id)
    {
$solicitud= solicitud::paginate();

        return view('solicitud.show2',compact('solicitud','id'));    }




} 
