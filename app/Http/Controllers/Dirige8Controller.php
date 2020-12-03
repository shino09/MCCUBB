<?php
namespace Magister\Http\Controllers;

use Magister\Dirige;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Magister\Tesis;
use Magister\Profesor;
use Magister\Alumno;

use Magister\Nucleo;
use Magister\Director;

use Magister\Colaborador;

use Magister\Visitante;

use Magister\Departamento;




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



class Dirige8Controller extends Controller
{


  public function __construct(){
        $this->middleware('auth');
//        $this->middleware('admin');
        $this->beforeFilter('@find',['only' => ['edit','update','destroy']]);
    }

    public function find(Route $route){
        $this->user = User::find($route->getParameter('usuario'));
    }

    public function getIndex()
    {
        return view('dirige8.index');
    }

    public function getList()
    {
        Session::put('dirige8_search', Input::has('ok') ? Input::get('search') : (Session::has('dirige8_search') ? Session::get('dirige8_search') : ''));
        Session::put('dirige8_field', Input::has('field') ? Input::get('field') : (Session::has('dirige8_field') ? Session::get('dirige8_field') : 'ALU_PATERNO'));
        Session::put('dirige8_sort', Input::has('sort') ? Input::get('sort') : (Session::has('dirige8_sort') ? Session::get('dirige8_sort') : 'asc'));
        $dirige8s = alumno::where('id', 'like', '%' . Session::get('dirige8_search') . '%')->orWhere('ALU_PATERNO','like',  Session::get('dirige8_search') . '%')->orderBy(Session::get('dirige8_field'), Session::get('dirige8_sort'))->paginate(500);




$dirige = dirige::all();
$nucleo = nucleo::all();
$profesor = profesor::all();

  

$tesis = tesis::all();


$alumno = Tesis::alumno();


                            //$DEPARTAMENTO = Departamento::lists('PRO_NOMBRES', 'id');

                return view('dirige8.list',compact('dirige8s','alumno','tesis','dirige','nucleo','profesor'));

        //return view('dirige.list', ['diriges' => $diriges]);
    }

     public function getUpdate($id,$NUCLEO_id)
    {
        //return view('dirige.update', ['dirige' => dirige::find($id)]);

            $TESIS = TESIS::lists('TES_NOMBRE', 'id');
                        $PROFESOR = PROFESOR::lists('id', 'id');


         $dirige = dirige::where('id', '=', $id)
                ->where('NUCLEO_id', '=', $NUCLEO_id)
                ->first();


    
        return view('dirige8.update',compact('dirige','TESIS','PROFESOR','id','NUCLEO_id'));
    }

    public function postUpdate($id,$NUCLEO_id)
    {
            $dirige= DB::table('DIRIGE')->where('id',$id)->where('NUCLEO_id',$NUCLEO_id)->delete();

         $validator = Validator::make(Input::all(), [
            'NUCLEO_id' => 'required|cl_rut','id' => 'required']);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
        $dirige = new dirige();
   $dirige->id = Input::get('id');
                                                $dirige->NUCLEO_id = Input::get('NUCLEO_id');


        $dirige->save();
        return ['url' => 'dirige8/list'];
    }




  public function getUpdate2($id,$NUCLEO_id)
    {
        //return view('dirige.update', ['dirige' => dirige::find($id)]);

            $TESIS = TESIS::lists('TES_NOMBRE', 'id');
                        $PROFESOR = PROFESOR::lists('id', 'id');


         $dirige = dirige::where('id', '=', $id)
                ->where('NUCLEO_id', '=', $NUCLEO_id)
                ->first();

                        // $dirige=dirige::all();

    
        return view('dirige8.update2',compact('dirige','TESIS','PROFESOR','id','NUCLEO_id'));
    }

    public function postUpdate2($id,$NUCLEO_id)
    {
            $dirige= DB::table('DIRIGE')->where('id',$id)->where('NUCLEO_id',$NUCLEO_id)->delete();

         $validator = Validator::make(Input::all(), [
            'NUCLEO_id' => 'required|cl_rut','id' => 'required']);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
        $dirige = new dirige();
   $dirige->id = Input::get('id');
                                                $dirige->NUCLEO_id = Input::get('NUCLEO_id');


        $dirige->save();
        return ['url' => 'dirige8/list'];
    }


 public function getUpdate3($id,$NUCLEO_id,$idviejo,$NUCLEO_idviejo)
    {
        //return view('dirige.update', ['dirige' => dirige::find($id)]);

  //          $TESIS = TESIS::lists('TES_NOMBRE', 'id');
//                        $PROFESOR = PROFESOR::lists('id', 'id');


         $tesis=tesis::where('id', '=', $id)
                ->first();
                $ALUMNO_id=$tesis->ALUMNO_id;
                $alumno=alumno::where('id', '=', $ALUMNO_id)
                ->first();
          $profesor = profesor::where('id', '=', $NUCLEO_id)
                ->first();


                         $dirige=dirige::all();

    
        return view('dirige8.update3',compact('dirige','tesis','alumno','profesor','id','NUCLEO_id','idviejo','NUCLEO_idviejo'));
    }

    public function postUpdate3($id,$NUCLEO_id,$idviejo,$NUCLEO_idviejo)
    {
            $dirigeviejo= DB::table('DIRIGE')->where('id',$idviejo)->where('NUCLEO_id',$NUCLEO_idviejo)->delete();
            $dirige= DB::table('DIRIGE')->where('id',$id)->where('NUCLEO_id',$NUCLEO_id)->delete();

         $validator = Validator::make(Input::all(), [
            'NUCLEO_id' => 'required|cl_rut','id' => 'required']);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
        $dirige = new dirige();
   $dirige->id = Input::get('id');
                                                $dirige->NUCLEO_id = Input::get('NUCLEO_id');


        $dirige->save();
        return ['url' => 'dirige8/list'];
    }




      public function getIndex3update($id,$NUCLEO_id)
    {
        return view('dirige8.index2update','NUCLEO_id','id');
    }

    public function getList3update($id,$NUCLEO_id,$idviejo,$NUCLEO_idviejo)
    {
         Session::put('dirige8nucleoupdate_search', Input::has('ok') ? Input::get('search') : (Session::has('dirige8nucleoupdateupdate_search') ? Session::get('dirige8nucleoupdate_search') : ''));
        Session::put('dirige8nucleoupdate_field', Input::has('field') ? Input::get('field') : (Session::has('dirige8nucleoupdate_field') ? Session::get('dirige8nucleoupdate_field') : 'id'));
        Session::put('dirige8nucleoupdate_sort', Input::has('sort') ? Input::get('sort') : (Session::has('dirige8nucleoupdate_sort') ? Session::get('dirige8nucleoupdate_sort') : 'asc'));
                        $profesor = nucleo::profesor();
        $nucleos = profesor::where('id', 'like', Session::get('dirige8nucleoupdate_search') . '%')->orWhere('PRO_PATERNO','like',  Session::get('dirige8nucleoupdate_search') . '%')
->orderBy(Session::get('dirige8nucleoupdate_field'), Session::get('dirige8nucleoupdate_sort'))
        ->paginate(1000);

                        $nucleos2 = nucleo::all();



                            //$profesor = Departamento::lists('name', 'id');

                return view('dirige8.list3update',compact('nucleos','profesor','nucleos2','NUCLEO_id','id','idviejo','NUCLEO_idviejo'));


        //return view('profesor.list', ['PROFESOR' => $PROFESOR]);
    }



   public function getIndex2update($id,$NUCLEO_id)
    {
        //return view('dirige8.index3');
                                $id=$id;

                        return view('dirige8.index3update',compact('id','NUCLEO_id'));

    }

    public function getList2update($id,$NUCLEO_id,$idviejo,$NUCLEO_idviejo)
    {
         
 Session::put('dirige8tesisupdate_search', Input::has('ok') ? Input::get('search') : (Session::has('dirige8tesisupdate_search') ? Session::get('dirige8tesisupdate_search') : ''));
        Session::put('dirige8tesisupdate_field', Input::has('field') ? Input::get('field') : (Session::has('dirige8tesisupdate_field') ? Session::get('dirige8tesisupdate_field') : 'ALU_PATERNO'));
        Session::put('dirige8tesisupdate_sort', Input::has('sort') ? Input::get('sort') : (Session::has('dirige8tesisupdate_sort') ? Session::get('dirige8tesisupdate_sort') : 'asc'));
        $dirige8tesisupdate = alumno::where('id', 'like', '%' . Session::get('dirige8tesisupdate_search') . '%')->orWhere('ALU_PATERNO','like',  Session::get('dirige8tesisupdate_search') . '%')->orderBy(Session::get('dirige8tesisupdate_field'), Session::get('dirige8tesisupdate_sort'))->paginate(500);



$tesis = DB::table('TESIS')
            ->leftJoin('DIRIGE', 'TESIS.id', '=', 'DIRIGE.id')
               ->whereNull('DIRIGE.id')

           //->get();
       ->get(array('TESIS.id', 'TESIS.TES_NOMBRE','TESIS.TES_ANO','TESIS.TES_SEMESTRE','TESIS.ALUMNO_id','TESIS.TES_DESCRIPCION','TESIS.TES_NOTA','TESIS.TES_FECHAINICIO','TESIS.TES_FECHAFINAL','TESIS.TES_ESTADO'));
 // $tesis = tesis::leftJoin('EVALUA', function($join) {
      //$join->on('TESIS.id', '=', 'EVALUA.id');
    //})
    //->whereNull('EVALUA.id')
   // ->get();

//$tesis = tesis::all();
$dirige = dirige::all();



$alumno = Tesis::alumno();


                            //$DEPARTAMENTO = Departamento::lists('PRO_NOMBRES', 'id');

                return view('dirige8.list2update',compact('dirige8tesisupdate','alumno','tesis','dirige','id','NUCLEO_id','idviejo','NUCLEO_idviejo'));    }








      public function getIndex2create($id)
    {
        return view('dirige8.index2create','id');
    }

    public function getList3create($id)
    {
            Session::put('dirige8nucleo_search', Input::has('ok') ? Input::get('search') : (Session::has('dirige8nucleo_search') ? Session::get('dirige8nucleo_search') : ''));
        Session::put('dirige8nucleo_field', Input::has('field') ? Input::get('field') : (Session::has('dirige8nucleo_field') ? Session::get('dirige8nucleo_field') : 'id'));
        Session::put('dirige8nucleo_sort', Input::has('sort') ? Input::get('sort') : (Session::has('dirige8nucleo_sort') ? Session::get('dirige8nucleo_sort') : 'asc'));
                        $profesor = nucleo::profesor();
        $nucleos = profesor::where('id', 'like', Session::get('dirige8nucleo_search') . '%')->orWhere('PRO_PATERNO','like',  Session::get('dirige8nucleo_search') . '%')
->orderBy(Session::get('dirige8nucleo_field'), Session::get('dirige8nucleo_sort'))
        ->paginate(500);

                        $nucleos2 = nucleo::all();



                            //$profesor = Departamento::lists('name', 'id');

                return view('dirige8.list3create',compact('nucleos','profesor','nucleos2','id'));


        //return view('profesor.list', ['PROFESOR' => $PROFESOR]);
    }



  
public function getList2create()
    {
         Session::put('dirige8tesiscreate_search', Input::has('ok') ? Input::get('search') : (Session::has('dirige8tesiscreate_search') ? Session::get('dirige8tesiscreate_search') : ''));
        Session::put('dirige8tesiscreate_field', Input::has('field') ? Input::get('field') : (Session::has('dirige8tesiscreate_field') ? Session::get('dirige8tesiscreate_field') : 'ALU_PATERNO'));
        Session::put('dirige8tesiscreate_sort', Input::has('sort') ? Input::get('sort') : (Session::has('dirige8tesiscreate_sort') ? Session::get('dirige8tesiscreate_sort') : 'asc'));
        $dirige8tesiscreates = alumno::where('id', 'like', '%' . Session::get('dirige8tesiscreate_search') . '%')->orWhere('ALU_PATERNO','like',  Session::get('dirige8tesiscreate_search') . '%')->orderBy(Session::get('dirige8tesiscreate_field'), Session::get('dirige8tesiscreate_sort'))->paginate(500);



$tesis = DB::table('TESIS')
            ->leftJoin('DIRIGE', 'TESIS.id', '=', 'DIRIGE.id')
               ->whereNull('DIRIGE.id')

           //->get();
       ->get(array('TESIS.id', 'TESIS.TES_NOMBRE','TESIS.TES_ANO','TESIS.TES_SEMESTRE','TESIS.ALUMNO_id','TESIS.TES_DESCRIPCION','TESIS.TES_NOTA','TESIS.TES_FECHAINICIO','TESIS.TES_FECHAFINAL','TESIS.TES_ESTADO'));
 // $tesis = tesis::leftJoin('EVALUA', function($join) {
      //$join->on('TESIS.id', '=', 'EVALUA.id');
    //})
    //->whereNull('EVALUA.id')
   // ->get();

//$tesis = tesis::all();
$dirige = dirige::all();



$alumno = Tesis::alumno();


                            //$DEPARTAMENTO = Departamento::lists('PRO_NOMBRES', 'id');

                return view('dirige8.list2create',compact('dirige8tesiscreates','alumno','tesis','dirige'));
            }
    public function getCreate($id,$NUCLEO_id)
    {
        //return view('dirige.create');

            //$TESIS = TESIS::lists('TES_NOMBRE', 'id');
                     //   $PROFESOR = PROFESOR::lists('id', 'id');

$tesis=tesis::where('id', '=', $id)
                ->first();
          $profesor = profesor::where('id', '=', $NUCLEO_id)
                ->first();
                 $ALUMNO_id=$tesis->ALUMNO_id;
                $alumno=alumno::where('id', '=', $ALUMNO_id)
                ->first();

        return view('dirige8.create',compact('tesis','alumno','profesor','NUCLEO_id','id'));
    }

    public function postCreate($id,$NUCLEO_id)
    {
                                        $dirige= DB::table('DIRIGE')->where('id',$id)->where('NUCLEO_id',$NUCLEO_id)->delete();

        $validator = Validator::make(Input::all(), [
            'NUCLEO_id' => 'required|cl_rut','id' => 'required']);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
        $dirige = new dirige();
   $dirige->id = Input::get('id');
                                                $dirige->NUCLEO_id = Input::get('NUCLEO_id');


        $dirige->save();
        return ['url' => 'dirige8/list'];
    }



public function getCreate2($id)
    {
        //return view('dirige.create');

         
                return view('dirige8.create2', ['profesor' => profesor::find($id)],compact('TESIS','PROFESOR'));

        //return view('dirige8.create2',compact('TESIS','PROFESOR'));
    }

    public function postCreate2($id)
    {
        $validator = Validator::make(Input::all(), [
            'NUCLEO_id' => 'required|cl_rut','id' => 'required']);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
        $dirige = new dirige();
   $dirige->id = Input::get('id');
                                                $dirige->NUCLEO_id = Input::get('NUCLEO_id');


        $dirige->save();
        return ['url' => 'dirige8/list'];
    }
    public function getDelete($id,$NUCLEO_id)
    {


 
    DB::table('DIRIGE')->where('id',$id)->where('NUCLEO_id',$NUCLEO_id)->delete();
        return Redirect('dirige8/list');
    }

   public function getShow($id,$NUCLEO_id)
    {

        $dirige = dirige::where('id', '=', $id)
                ->where('NUCLEO_id', '=', $NUCLEO_id)
                ->first();

        return view('dirige8.show', ['dirige' => $dirige]);
    }


public function getShow2($id,$NUCLEO_id)
    {
$profesor= profesor::paginate();
                    $DEPARTAMENTO = profesor::DEPARTAMENTO();
                         $tesis=tesis::all();
                                                  $PROFESOR=PROFESOR::all();

                         $dirige=dirige::all();
                                                  $alumno=alumno::all();



        return view('dirige8.show2',compact('profesor','id','NUCLEO_id','DEPARTAMENTO','tesis','PROFESOR','dirige','alumno'));    }



        public function getShowprofesorcreate($id,$NUCLEO_id)
    {
$profesor= profesor::paginate();
                    $DEPARTAMENTO = profesor::DEPARTAMENTO();
                        $director=Director::all();    

        $nucleo=Nucleo::all();    

        $visitante=Visitante::all();    

        $colaborador=Colaborador::all();  

        return view('dirige8.showprofesorcreate',compact('NUCLEO_id','profesor','id','DEPARTAMENTO','director','nucleo','visitante','colaborador'));    }


        public function getShowtesiscreate($id)
    {
$tesis= Tesis::paginate();
$alumno = tesis::alumno();

        return view('dirige8.showtesiscreate',compact('tesis','id','alumno'));    }


                  public function getShowprofesorupdate($id,$pro_id,$idviejo,$NUCLEO_idviejo)
    {
$profesor= profesor::paginate();
                    $DEPARTAMENTO = profesor::DEPARTAMENTO();
                           $director=Director::all();    

        $nucleo=Nucleo::all();    

        $visitante=Visitante::all();    

        $colaborador=Colaborador::all();  

        return view('dirige8.showprofesorupdate',compact('profesor','id','DEPARTAMENTO','pro_id','idviejo','NUCLEO_idviejo','director','nucleo','visitante','colaborador'));    }


        public function getShowtesisupdate($id,$pro_id,$idviejo,$NUCLEO_idviejo)
    {
$tesis= Tesis::paginate();
$alumno = tesis::alumno();

        return view('dirige8.showtesisupdate',compact('tesis','id','pro_id','alumno','idviejo','NUCLEO_idviejo'));    }


} 
