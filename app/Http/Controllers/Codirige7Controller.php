<?php
namespace Magister\Http\Controllers;

use Magister\Codirige;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Magister\Tesis;
use Magister\Profesor;
use Magister\Alumno;
use Magister\Departamento;

use Magister\Nucleo;
use Magister\Director;

use Magister\Colaborador;

use Magister\Visitante;


use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;


use Illuminate\Http\Request;
use Magister\Http\Requests;
use Magister\Http\Requests\UserCreateRequest;
use Magister\Http\Requests\UserUpdateRequest;
use Magister\Http\Controllers\Controller;
use Magister\User;
use Redirect;
use Illuminate\Routing\Route;



class Codirige7Controller extends Controller
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
        return view('codirige7.index');
    }

    public function getList()
    {
         Session::put('codirige7_search', Input::has('ok') ? Input::get('search') : (Session::has('codirige7_search') ? Session::get('codirige7_search') : ''));
        Session::put('codirige7_field', Input::has('field') ? Input::get('field') : (Session::has('codirige7_field') ? Session::get('codirige7_field') : 'ALU_PATERNO'));
        Session::put('codirige7_sort', Input::has('sort') ? Input::get('sort') : (Session::has('codirige7_sort') ? Session::get('codirige7_sort') : 'asc'));
        $codirige7s = alumno::where('id', 'like', '%' . Session::get('codirige7_search') . '%')->orWhere('ALU_PATERNO','like',  Session::get('codirige7_search') . '%')->orderBy(Session::get('codirige7_field'), Session::get('codirige7_sort'))->paginate(500);





  

$tesis = tesis::all();
$profesor = profesor::all();

$codirige = codirige::all();



$alumno = Tesis::alumno();


                            //$DEPARTAMENTO = Departamento::lists('PRO_NOMBRES', 'id');

                return view('codirige7.list',compact('codirige7s','alumno','tesis','codirige','profesor'));


        //return view('dirige.list', ['diriges' => $diriges]);
    }

     public function getUpdate($id,$PROFESOR_id)
    {
        //return view('dirige.update', ['dirige' => dirige::find($id)]);

            $TESIS = TESIS::lists('TES_NOMBRE', 'id');
                        $PROFESOR = PROFESOR::lists('id', 'id');


         $dirige = codirige::where('id', '=', $id)
                ->where('PROFESOR_id', '=', $PROFESOR_id)
                ->first();


    
        return view('codirige7.update',compact('dirige','TESIS','PROFESOR','id','PROFESOR_id'));
    }

    public function postUpdate($id,$PROFESOR_id)
    {
            $dirige= DB::table('CODIRIGE')->where('id',$id)->where('PROFESOR_id',$PROFESOR_id)->delete();

         $validator = Validator::make(Input::all(), [
            'PROFESOR_id' => 'required|cl_rut','id' => 'required']);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
        $dirige = new codirige();
   $dirige->id = Input::get('id');
                                                $dirige->PROFESOR_id = Input::get('PROFESOR_id');


        $dirige->save();
        return ['url' => 'codirige7/list'];
    }




  public function getUpdate2($id,$PROFESOR_id)
    {
        //return view('dirige.update', ['dirige' => dirige::find($id)]);

            $TESIS = TESIS::lists('TES_NOMBRE', 'id');
                        $PROFESOR = PROFESOR::lists('id', 'id');


         $dirige = codirige::where('id', '=', $id)
                ->where('PROFESOR_id', '=', $PROFESOR_id)
                ->first();

                        // $dirige=dirige::all();

    
        return view('codirige7.update2',compact('dirige','TESIS','PROFESOR','id','PROFESOR_id'));
    }

    public function postUpdate2($id,$PROFESOR_id)
    {
            $dirige= DB::table('CODIRIGE')->where('id',$id)->where('PROFESOR_id',$PROFESOR_id)->delete();

         $validator = Validator::make(Input::all(), [
            'PROFESOR_id' => 'required|cl_rut','id' => 'required']);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
        $dirige = new codirige();
   $dirige->id = Input::get('id');
                                                $dirige->PROFESOR_id = Input::get('PROFESOR_id');


        $dirige->save();
        return ['url' => 'codirige7/list'];
    }


 public function getUpdate3($id,$PROFESOR_id,$idviejo,$PROFESOR_idviejo)
    {
        //return view('dirige.update', ['dirige' => dirige::find($id)]);

        $tesis=tesis::where('id', '=', $id)
                ->first();
          $profesor = profesor::where('id', '=', $PROFESOR_id)
                ->first();
                 $ALUMNO_id=$tesis->ALUMNO_id;
                $alumno=alumno::where('id', '=', $ALUMNO_id)
                ->first();
         

                         $dirige=codirige::all();

    
        return view('codirige7.update3',compact('dirige','tesis','profesor','alumno','id','PROFESOR_id','idviejo','PROFESOR_idviejo'));
    }

    public function postUpdate3($id,$PROFESOR_id,$idviejo,$PROFESOR_idviejo)
    {
            $dirigeviejo= DB::table('CODIRIGE')->where('id',$idviejo)->where('PROFESOR_id',$PROFESOR_idviejo)->delete();
            $dirige= DB::table('CODIRIGE')->where('id',$id)->where('PROFESOR_id',$PROFESOR_id)->delete();

         $validator = Validator::make(Input::all(), [
            'PROFESOR_id' => 'required|cl_rut','id' => 'required']);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
        $dirige = new codirige();
   $dirige->id = Input::get('id');
                                                $dirige->PROFESOR_id = Input::get('PROFESOR_id');


        $dirige->save();
        return ['url' => 'codirige7/list'];
    }




      public function getIndex3update($id,$PROFESOR_id)
    {
        return view('codirige7.index3update','PROFESOR_id','id');
    }

    public function getList3update($id,$PROFESOR_id,$idviejo,$PROFESOR_idviejo)
    {
        Session::put('codirigeprofesorupdate_search', Input::has('ok') ? Input::get('search') : (Session::has('codirigeprofesorupdate_search') ? Session::get('codirigeprofesorupdate_search') : ''));
        Session::put('codirigeprofesorupdate_field', Input::has('field') ? Input::get('field') : (Session::has('codirigeprofesorupdate_field') ? Session::get('codirigeprofesorupdate_field') : 'PRO_PATERNO'));
        Session::put('codirigeprofesorupdate_sort', Input::has('sort') ? Input::get('sort') : (Session::has('codirigeprofesorupdate_sort') ? Session::get('codirigeprofesorupdate_sort') : 'asc'));
        $PROFESOR = profesor::where('id', 'like', Session::get('codirigeprofesorupdate_search') . '%')->orWhere('PRO_PATERNO','like',  Session::get('codirigeprofesorupdate_search') . '%')->orderBy(Session::get('codirigeprofesorupdate_field'), Session::get('codirigeprofesorupdate_sort'))->paginate(500);



                            //$DEPARTAMENTO = Departamento::lists('PRO_NOMBRES', 'id');

               // return view('profesor.list',compact('PROFESOR'));

                    $DEPARTAMENTO = profesor::DEPARTAMENTO();
$profesor2 = DB::table('PROFESOR')
            ->leftJoin('CODIRIGE', 'PROFESOR.id', '=', 'CODIRIGE.PROFESOR_id')
               ->whereNull('CODIRIGE.id')
               //preguntar si profesor nucleo puede codirigir tesis
                  ->leftJoin('NUCLEO', 'PROFESOR.id', '=', 'NUCLEO.id')
               ->whereNull('NUCLEO.id')

           //->get();
       ->get(array('PROFESOR.id', 'PROFESOR.PRO_NOMBRES','PROFESOR.PRO_PATERNO','PROFESOR.PRO_MATERNO','PROFESOR.PRO_TITULO','PROFESOR.PRO_GRADO','PROFESOR.PRO_TELEFONO','PROFESOR.PRO_EMAIL','PROFESOR.DEPARTAMENTO_id'));

                            //$DEPARTAMENTO = Departamento::lists('PRO_NOMBRES', 'id');

                return view('codirige7.list3update',compact('PROFESOR','profesor2','DEPARTAMENTO','PROFESOR_id','id','idviejo','PROFESOR_idviejo'));


        //return view('profesor.list', ['PROFESOR' => $PROFESOR]);
    }



   public function getIndex2update($id,$PROFESOR_id)
    {
        //return view('codirige7.index3');
                                $id=$id;

                        return view('codirige7.index2update',compact('id','PROFESOR_id'));

    }

    public function getList2update($id,$PROFESOR_id,$idviejo,$PROFESOR_idviejo)
    {
          Session::put('codirige7tesisupdate_search', Input::has('ok') ? Input::get('search') : (Session::has('codirige7tesisupdate_search') ? Session::get('codirige7tesisupdate_search') : ''));
        Session::put('codirige7tesisupdate_field', Input::has('field') ? Input::get('field') : (Session::has('codirige7tesisupdate_field') ? Session::get('codirige7tesisupdate_field') : 'ALU_PATERNO'));
        Session::put('codirige7tesisupdate_sort', Input::has('sort') ? Input::get('sort') : (Session::has('codirige7tesisupdate_sort') ? Session::get('codirige7tesisupdate_sort') : 'asc'));
        $codirige7tesisupdate = alumno::where('id', 'like', '%' . Session::get('codirige7tesisupdate_search') . '%')->orWhere('ALU_PATERNO','like',  Session::get('codirige7tesisupdate_search') . '%')->orderBy(Session::get('codirige7tesisupdate_field'), Session::get('codirige7tesisupdate_sort'))->paginate(500);



$tesis = DB::table('TESIS')
            ->leftJoin('CODIRIGE', 'TESIS.id', '=', 'CODIRIGE.id')
               ->whereNull('CODIRIGE.id')

           //->get();
       ->get(array('TESIS.id', 'TESIS.TES_NOMBRE','TESIS.TES_ANO','TESIS.TES_SEMESTRE','TESIS.ALUMNO_id','TESIS.TES_DESCRIPCION','TESIS.TES_NOTA','TESIS.TES_FECHAINICIO','TESIS.TES_FECHAFINAL','TESIS.TES_ESTADO'));
 // $tesis = tesis::leftJoin('EVALUA', function($join) {
      //$join->on('TESIS.id', '=', 'EVALUA.id');
    //})
    //->whereNull('EVALUA.id')
   // ->get();

//$tesis = tesis::all();
$codirige = codirige::all();



$alumno = Tesis::alumno();


                            //$DEPARTAMENTO = Departamento::lists('PRO_NOMBRES', 'id');

                return view('codirige7.list2update',compact('codirige7tesisupdate','alumno','tesis','codirige','id','idviejo','PROFESOR_id','PROFESOR_idviejo'));
    }








      public function getIndex2create($id)
    {
        return view('codirige7.index2create','id');
    }

    public function getList3create($id)
    {
        Session::put('codirigeprofesorcreate_search', Input::has('ok') ? Input::get('search') : (Session::has('codirigeprofesorcreate_search') ? Session::get('codirigeprofesorcreate_search') : ''));
        Session::put('codirigeprofesorcreate_field', Input::has('field') ? Input::get('field') : (Session::has('codirigeprofesorcreate_field') ? Session::get('codirigeprofesorcreate_field') : 'PRO_PATERNO'));
        Session::put('codirigeprofesorcreate_sort', Input::has('sort') ? Input::get('sort') : (Session::has('codirigeprofesorcreate_sort') ? Session::get('codirigeprofesorcreate_sort') : 'asc'));
        $PROFESOR = profesor::where('id', 'like', Session::get('codirigeprofesorcreate_search') . '%')->orWhere('PRO_PATERNO','like',  Session::get('codirigeprofesorcreate_search') . '%')->orderBy(Session::get('codirigeprofesorcreate_field'), Session::get('codirigeprofesorcreate_sort'))->paginate(500);

$profesor2 = DB::table('PROFESOR')
            ->leftJoin('CODIRIGE', 'PROFESOR.id', '=', 'CODIRIGE.PROFESOR_id')
               ->whereNull('CODIRIGE.id')
                  ->leftJoin('NUCLEO', 'PROFESOR.id', '=', 'NUCLEO.id')
               ->whereNull('NUCLEO.id')

           //->get();
       ->get(array('PROFESOR.id', 'PROFESOR.PRO_NOMBRES','PROFESOR.PRO_PATERNO','PROFESOR.PRO_MATERNO','PROFESOR.PRO_TITULO','PROFESOR.PRO_GRADO','PROFESOR.PRO_TELEFONO','PROFESOR.PRO_EMAIL','PROFESOR.DEPARTAMENTO_id'));

                            //$DEPARTAMENTO = Departamento::lists('PRO_NOMBRES', 'id');

               // return view('profesor.list',compact('PROFESOR'));

                    $DEPARTAMENTO = profesor::DEPARTAMENTO();


                            //$DEPARTAMENTO = Departamento::lists('PRO_NOMBRES', 'id');

                return view('codirige7.list3create',compact('PROFESOR','profesor2','DEPARTAMENTO','id'));


        //return view('profesor.list', ['PROFESOR' => $PROFESOR]);
    }




public function getList2create()
    {
         Session::put('codirige7tesiscreate_search', Input::has('ok') ? Input::get('search') : (Session::has('codirige7tesiscreate_search') ? Session::get('codirige7tesiscreate_search') : ''));
        Session::put('codirige7tesiscreate_field', Input::has('field') ? Input::get('field') : (Session::has('codirige7tesiscreate_field') ? Session::get('codirige7tesiscreate_field') : 'ALU_PATERNO'));
        Session::put('codirige7tesiscreate_sort', Input::has('sort') ? Input::get('sort') : (Session::has('codirige7tesiscreate_sort') ? Session::get('codirige7tesiscreate_sort') : 'asc'));
        $codirige7tesiscreates = alumno::where('id', 'like', '%' . Session::get('codirige7tesiscreate_search') . '%')->orWhere('ALU_PATERNO','like',  Session::get('codirige7tesiscreate_search') . '%')->orderBy(Session::get('codirige7tesiscreate_field'), Session::get('codirige7tesiscreate_sort'))->paginate(500);



$tesis = DB::table('TESIS')
            ->leftJoin('CODIRIGE', 'TESIS.id', '=', 'CODIRIGE.id')
               ->whereNull('CODIRIGE.id')

           //->get();
       ->get(array('TESIS.id', 'TESIS.TES_NOMBRE','TESIS.TES_ANO','TESIS.TES_SEMESTRE','TESIS.ALUMNO_id','TESIS.TES_DESCRIPCION','TESIS.TES_NOTA','TESIS.TES_FECHAINICIO','TESIS.TES_FECHAFINAL','TESIS.TES_ESTADO'));
 // $tesis = tesis::leftJoin('EVALUA', function($join) {
      //$join->on('TESIS.id', '=', 'EVALUA.id');
    //})
    //->whereNull('EVALUA.id')
   // ->get();

//$tesis = tesis::all();
$codirige = codirige::all();



$alumno = Tesis::alumno();


                            //$DEPARTAMENTO = Departamento::lists('PRO_NOMBRES', 'id');

                return view('codirige7.list2create',compact('codirige7tesiscreates','alumno','tesis','codirige'));
            }
    public function getCreate($id,$PROFESOR_id)
    {
        //return view('dirige.create');

            //$TESIS = TESIS::lists('TES_NOMBRE', 'id');
                       // $PROFESOR = PROFESOR::lists('id', 'id');

$tesis=tesis::where('id', '=', $id)
                ->first();
          $profesor = profesor::where('id', '=', $PROFESOR_id)
                ->first();
                 $ALUMNO_id=$tesis->ALUMNO_id;
                $alumno=alumno::where('id', '=', $ALUMNO_id)
                ->first();

        return view('codirige7.create',compact('tesis','profesor','alumno','PROFESOR_id','id'));
    }

    public function postCreate($id,$PROFESOR_id)
    {
        $validator = Validator::make(Input::all(), [
            'PROFESOR_id' => 'required|cl_rut','id' => 'required']);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
        $dirige = new codirige();
   $dirige->id = Input::get('id');
                                                $dirige->PROFESOR_id = Input::get('PROFESOR_id');


        $dirige->save();
        return ['url' => 'codirige7/list'];
    }



public function getCreate2($id)
    {
        //return view('dirige.create');

         
                return view('codirige7.create2', ['profesor' => profesor::find($id)],compact('TESIS','PROFESOR'));

        //return view('codirige7.create2',compact('TESIS','PROFESOR'));
    }

    public function postCreate2($id)
    {
        $validator = Validator::make(Input::all(), [
            'PROFESOR_id' => 'required|cl_rut','id' => 'required']);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
        $dirige = new codirige();
   $dirige->id = Input::get('id');
                                                $dirige->PROFESOR_id = Input::get('PROFESOR_id');


        $dirige->save();
        return ['url' => 'codirige7/list'];
    }
    public function getDelete($id,$PROFESOR_id)
    {


 
    DB::table('CODIRIGE')->where('id',$id)->where('PROFESOR_id',$PROFESOR_id)->delete();
        return Redirect('codirige7/list');
    }

  


public function getShow2($PROFESOR_id,$id)
    {
$profesor= profesor::paginate();
                    $DEPARTAMENTO = profesor::DEPARTAMENTO();
                         $tesis=tesis::all();
                                                  $PROFESOR=PROFESOR::all();

                         $dirige=codirige::all();
                                                  $alumno=alumno::all();



        return view('codirige7.show2',compact('profesor','id','PROFESOR_id','DEPARTAMENTO','tesis','PROFESOR','dirige','alumno'));    }



        public function getShowprofesorcreate($id,$pro_id)
    {
$profesor= profesor::paginate();
                    $DEPARTAMENTO = profesor::DEPARTAMENTO();
                        $director=Director::all();    

        $nucleo=Nucleo::all();    

        $visitante=Visitante::all();    

        $colaborador=Colaborador::all(); 

        return view('codirige7.showprofesorcreate',compact('profesor','id','DEPARTAMENTO','pro_id','director','nucleo','visitante','colaborador'));    }


        public function getShowtesiscreate($id)
    {
$tesis= Tesis::paginate();
$alumno = tesis::alumno();


        return view('codirige7.showtesiscreate',compact('tesis','id','alumno'));    }


                  public function getShowprofesorupdate($id,$pro_id,$idviejo,$PROFESOR_idviejo)
    {
$profesor= profesor::paginate();
                    $DEPARTAMENTO = profesor::DEPARTAMENTO();
                        $director=Director::all();    

        $nucleo=Nucleo::all();    

        $visitante=Visitante::all();    

        $colaborador=Colaborador::all(); 

        return view('codirige7.showprofesorupdate',compact('profesor','id','DEPARTAMENTO','pro_id','id','idviejo','PROFESOR_idviejo','director','nucleo','visitante','colaborador'));    }


        public function getShowtesisupdate($id,$pro_id,$idviejo,$PROFESOR_idviejo)
    {
$tesis= Tesis::paginate();
$alumno = tesis::alumno();

        return view('codirige7.showtesisupdate',compact('tesis','id','pro_id','alumno','id','idviejo','PROFESOR_idviejo'));    }


} 
