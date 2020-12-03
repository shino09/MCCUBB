<?php
namespace Magister\Http\Controllers;

use Magister\Tribunal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Magister\Departamento;
use Magister\Contrato;


use Illuminate\Http\Request;
use Magister\Http\Requests;
use Magister\Http\Requests\UserCreateRequest;
use Magister\Http\Requests\UserUpdateRequest;
use Magister\Http\Controllers\Controller;
use Magister\User;
use Redirect;
use Illuminate\Routing\Route;



class TribunalController extends Controller
{


  public function __construct(){
        $this->middleware('auth');
        $this->middleware('admin');
        $this->beforeFilter('@find',['only' => ['edit','update','destroy']]);
    }

    public function find(Route $route){
        $this->user = User::find($route->getParameter('usuario'));
    }

    public function getIndex()
    {
        return view('tribunal.index');
    }

    public function getList()
    {
        Session::put('tribunal_search', Input::has('ok') ? Input::get('search') : (Session::has('tribunal_search') ? Session::get('tribunal_search') : ''));
        Session::put('tribunal_field', Input::has('field') ? Input::get('field') : (Session::has('tribunal_field') ? Session::get('tribunal_field') : 'id'));
        Session::put('tribunal_sort', Input::has('sort') ? Input::get('sort') : (Session::has('tribunal_sort') ? Session::get('tribunal_sort') : 'asc'));
        $tribunals = tribunal::where('id', 'like', Session::get('tribunal_search') . '%')

                 ->orWhere('id','like',  Session::get('tribunal_search') . '%')

            ->orderBy(Session::get('tribunal_field'), Session::get('tribunal_sort'))->paginate(20);



                            //$departamentos = Departamento::lists('TRI_NOMBRES', 'id');

                return view('tribunal.list',compact('tribunals'));


        //return view('tribunal.list', ['tribunals' => $tribunals]);
    }

    public function getUpdate($id)
    {
        //return view('tribunal.update', ['tribunal' => tribunal::find($id)]);


        
    
        return view('tribunal.update', ['tribunal' => tribunal::find($id)]);

    }

    public function postUpdate($id)
    {
        $tribunal = tribunal::find($id);
        

            $rules = ['TRI_FECHACREACION' => 'required'];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }

        $tribunal->TRI_FECHACREACION = Input::get('TRI_FECHACREACION');
     

        $tribunal->save();
        return ['url' => 'tribunal/list'];
    }

    public function getCreate()
    {
        //return view('tribunal.create');



        return view('tribunal.create');
    }

    public function postCreate()
    {
        $validator = Validator::make(Input::all(), [
           "TRI_FECHACREACION" => "required" ]);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
        $tribunal = new tribunal();
            $tribunal->TRI_FECHACREACION = Input::get('TRI_FECHACREACION');



        $tribunal->save();
        return ['url' => 'tribunal/list'];
    }

    public function getDelete($id)
    {
        tribunal::destroy($id);
        return Redirect('tribunal/list');
    }


   public function getShow($id)
    {
        return view('tribunal.show', ['tribunal' => tribunal::find($id)]);
    }

} 
