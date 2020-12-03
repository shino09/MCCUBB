<?php
namespace Magister\Http\Controllers;

use Magister\Tesis;
use Magister\Alumno;

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
use Carbon\Carbon;
use DB;


class Tesis2Controller extends Controller
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
        return view('tesis2.index');
    }

    public function getList()
    {
        Session::put('tesis2_search', Input::has('ok') ? Input::get('search') : (Session::has('tesis2_search') ? Session::get('tesis2_search') : ''));
        Session::put('tesis2_field', Input::has('field') ? Input::get('field') : (Session::has('tesis2_field') ? Session::get('tesis2_field') : 'ALU_PATERNO'));
        Session::put('tesis2_sort', Input::has('sort') ? Input::get('sort') : (Session::has('tesis2_sort') ? Session::get('tesis2_sort') : 'asc'));
        $tesis2s = alumno::where('id', 'like', '%' . Session::get('tesis2_search') . '%')->orWhere('ALU_PATERNO','like',  Session::get('tesis2_search') . '%')->orderBy(Session::get('tesis2_field'), Session::get('tesis2_sort'))->paginate(100);





  

$tesis = tesis::all();




$alumno = Tesis::alumno();


                            //$DEPARTAMENTO = Departamento::lists('PRO_NOMBRES', 'id');

                return view('tesis2.list',compact('tesis2s','alumno','tesis'));

        //return view('tesis2.list', ['tesis2s' => $tesis2s]);
    }

    public function getUpdate($id)
    {
        //return view('tesis2.update', ['tesis2' => tesis2::find($id)]);

           //$alumno = Alumno::lists('id', 'id');

         $alumno = Alumno::select(
          'id',
          DB::raw('CONCAT(ALU_PATERNO," ",ALU_MATERNO," "," ","( ",id ,")") as full_name')

        )
       ->orderBy('full_name')
       ->lists('full_name', 'id');
    
        return view('tesis2.update', ['tesis2' => Tesis::find($id)],compact('alumno'));

    }

    public function postUpdate($id)
    {
        $tesis2 = tesis::find($id);
                   //$tesis= DB::table('TESIS')->where('id',$id)->where('TRIBUNAL_id',$TRIBUNAL_id)->delete();


         /*$rules = ['TES_NOMBRE' => 'required|regex:/^[^\s]+(\s*[^\s]+)*$/|unique_with:TESIS,TES_SEMESTRE,TES_ANO,ALUMNO_id,$id',
         "TES_SEMESTRE" => "required|integer|unique_with:TESIS,ALUMNO_id,TES_ANO,TES_NOMBRE,$id",
         "TES_ANO" => "required|integer|unique_with:TESIS,TES_SEMESTRE,ALUMNO_id,TES_NOMBRE,$id",
         "ALUMNO_id" => "required|cl_rut|unique_with:TESIS,TES_SEMESTRE,TES_ANO,TES_NOMBRE,$id",
         "TES_FECHAINICIO" => "required"  , "TES_DESCRIPCION" => "required", "TES_ESTADO" => "required"];
    
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }*/

$messages=[
            'ALUMNO_Id.unique_with' => 'La convinación [Alumno,Semestre,Año] ya existe en el sistema',
                        'TES_SEMESTRE.unique_with' => 'La convinación [Alumno,Semestre,Año] ya existe en el sistema',

            'TES_ANO.unique_with' => 'La convinación [Alumno,Semestre,Año] ya existe en el sistema',

        ];


        $rules = [
         "TES_SEMESTRE" => "required|integer|unique_with:TESIS,ALUMNO_id,TES_ANO,$id",
         "TES_ANO" => "required|integer|unique_with:TESIS,ALUMNO_id,TES_SEMESTRE,$id",
         "ALUMNO_id" => "required|cl_rut|unique_with:TESIS,TES_SEMESTRE,TES_ANO,$id",
         "TES_FECHAINICIO" => "required"  , "TES_DESCRIPCION" => "required", "TES_ESTADO" => "required"];
       if ($tesis2->TES_NOMBRE != Input::get('TES_NOMBRE'))
            $rules += ['TES_NOMBRE' => 'required|regex:/^[^\s]+(\s*[^\s]+)*$/'];
        $validator = Validator::make(Input::all(), $rules,$messages);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }

        $tesis2->TES_NOMBRE = Input::get('TES_NOMBRE');
        $tesis2->TES_SEMESTRE = Input::get('TES_SEMESTRE');
                $tesis2->TES_ANO = Input::get('TES_ANO');
        $tesis2->TES_DESCRIPCION = Input::get('TES_DESCRIPCION');
                $tesis2->TES_FECHAINICIO = Input::get('TES_FECHAINICIO');

        $tesis2->TES_FECHAFINAL = Input::get('TES_FECHAFINAL');

        $tesis2->TES_ESTADO = Input::get('TES_ESTADO');

                //$tesis2->TES_NOTA = Input::get('TES_NOTA');

        $tesis2->ALUMNO_id = Input::get('ALUMNO_id');


        $tesis2->save();

$idtesis=$tesis2->id;
          

         $tesis4=tesis::where('id', '=', $idtesis)
                ->first();

                $tesisestado=$tesis4->TES_ESTADO;
        if($tesisestado==0)
        {
   $tesis3= DB::table('TESIS')
            ->where('id', $idtesis)
            ->update(['TES_NOTA' => 0]);


        }

         if($tesisestado==1)
        {
   $tesis3= DB::table('TESIS')
            ->where('id', $idtesis)
            ->update(['TES_NOTA' => 0]);


        }

          if($tesisestado==2)
        {
   $tesis3= DB::table('TESIS')
            ->where('id', $idtesis)
            ->update(['TES_NOTA' => 0]);


        }
            if($tesisestado==3)
        {
   $tesis3= DB::table('TESIS')
            ->where('id', $idtesis)
            ->update(['TES_NOTA' => 0]);


        }        return ['url' => 'tesis2/list'];
    }

    public function getCreate()
    {
        //return view('tesis2.create');


         //$alumno = Alumno::lists('id', 'id');
           $alumno = Alumno::select(
          'id',
          DB::raw('CONCAT(ALU_PATERNO," ",ALU_MATERNO," "," ","( ",id ,")") as full_name')

        )
       ->orderBy('full_name')
       ->lists('full_name', 'id');


        return view('tesis2.create',compact('alumno'));

           // $tesis2s = tesis2::lists('DEP_NOMBRE', 'id');

        //return view('tesis2.create',compact('tesis2s'));
    }

    public function postCreate()
    {

      $messages=[
            'ALUMNO_Id.unique_with' => 'La convinación [Alumno,Semestre,Año] ya existe en el sistema',
                        'TES_SEMESTRE.unique_with' => 'La convinación [Alumno,Semestre,Año] ya existe en el sistema',

            'TES_ANO.unique_with' => 'La convinación [Alumno,Semestre,Año] ya existe en el sistema',

        ];
        $validator = Validator::make(Input::all(), [
        "TES_NOMBRE" => "required|regex:/^[^\s]+(\s*[^\s]+)*$/",      
         "ALUMNO_id" => "required|cl_rut|unique_with:TESIS,TES_SEMESTRE,TES_ANO",
'TES_SEMESTRE' => 'required|integer|unique_with:TESIS,TES_ANO,ALUMNO_id' ,
"TES_ANO" => "required|integer|unique_with:TESIS,ALUMNO_id,TES_SEMESTRE",
"TES_DESCRIPCION" => "required","TES_FECHAINICIO" => "required"  , "TES_ESTADO" => "required"],$messages);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
        $tesis2 = new tesis();
        $tesis2->TES_NOMBRE = Input::get('TES_NOMBRE');
        $tesis2->TES_SEMESTRE = Input::get('TES_SEMESTRE');
          $tesis2->TES_ANO = Input::get('TES_ANO');
        $tesis2->TES_DESCRIPCION = Input::get('TES_DESCRIPCION');
         $tesis2->TES_FECHAINICIO = Input::get('TES_FECHAINICIO');

        $tesis2->TES_FECHAFINAL = Input::get('TES_FECHAFINAL');

       


        $tesis2->ALUMNO_id = Input::get('ALUMNO_id');




         $tesis2->TES_ESTADO = Input::get('TES_ESTADO');



        $tesis2->save();

$idtesis=$tesis2->id;
          

         $tesis4=tesis::where('id', '=', $idtesis)
                ->first();

                $tesisestado=$tesis4->TES_ESTADO;
        if($tesisestado==0)
        {
   $tesis3= DB::table('TESIS')
            ->where('id', $idtesis)
            ->update(['TES_NOTA' => 0]);


        }

         if($tesisestado==1)
        {
   $tesis3= DB::table('TESIS')
            ->where('id', $idtesis)
            ->update(['TES_NOTA' => 0]);


        }

          if($tesisestado==2)
        {
   $tesis3= DB::table('TESIS')
            ->where('id', $idtesis)
            ->update(['TES_NOTA' => 0]);


        }
            if($tesisestado==3)
        {
   $tesis3= DB::table('TESIS')
            ->where('id', $idtesis)
            ->update(['TES_NOTA' => 0]);


        }
        return ['url' => 'tesis2/list'];
    }

    public function getDelete($id)
    {
        //Tesis::destroy($id);
                  $dirige= DB::table('TESIS')->where('id',$id)->delete();

        return Redirect('tesis2/list');
    }



     public function getShow($id)
    {
        return view('tesis2.show', ['tesis2' => Tesis::find($id)]);
    }



    public function getShow2($id)
    {
$tesis2 = tesis::all();
$alumno = Tesis::alumno();

        return view('tesis2.show2',compact('tesis2','id','alumno'));    }


} 
