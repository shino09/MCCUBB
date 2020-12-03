<?php
namespace Magister\Http\Controllers;

use Magister\Posee;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Magister\Tesis;
use Magister\Profesor;
use Magister\Alumno;

use Magister\Beneficio;
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



class Posee3Controller extends Controller
{


  public function __construct(){
        $this->middleware('auth');
      //  $this->middleware('admin');
        $this->beforeFilter('@find',['only' => ['edit','update','destroy']]);
    }

    public function find(Route $route){
        $this->user = User::find($route->getParameter('usuario'));
    }

    public function getIndex()
    {
        return view('posee3.index');
    }

    public function getList()
    {
         Session::put('posee_search', Input::has('ok') ? Input::get('search') : (Session::has('posee_search') ? Session::get('posee_search') : ''));
        Session::put('posee_field', Input::has('field') ? Input::get('field') : (Session::has('posee_field') ? Session::get('posee_field') : 'id'));
        Session::put('posee_sort', Input::has('sort') ? Input::get('sort') : (Session::has('posee_sort') ? Session::get('posee_sort') : 'asc'));
        $poseealumnolist = alumno::where('id', 'like', Session::get('posee_search') . '%')->orWhere('ALU_PATERNO','like',  Session::get('posee_search') . '%')
->orderBy(Session::get('posee_field'), Session::get('posee_sort'))
        ->paginate(500);

                        $asitealumno = posee::alumno();

$poseeBENEFICIO = posee::BENEFICIO();

                        $BENEFICIO = BENEFICIO::all();
                                                $alumno = alumno::all();


$posee = posee::all();




 return view('posee3.list',compact('poseealumnolist','poseealumno','poseeBENEFICIO','BENEFICIO','alumno','posee'));


    }



   public function getList2create()
    {
               Session::put('poseealumnocreate_search', Input::has('ok') ? Input::get('search') : (Session::has('poseealumnocreate_search') ? Session::get('poseealumnocreate_search') : ''));
        Session::put('poseealumnocreate_field', Input::has('field') ? Input::get('field') : (Session::has('poseealumnocreate_field') ? Session::get('poseealumnocreate_field') : 'id'));
        Session::put('poseealumnocreate_sort', Input::has('sort') ? Input::get('sort') : (Session::has('poseealumnocreate_sort') ? Session::get('poseealumnocreate_sort') : 'asc'));
        $poseealumnolist = alumno::where('id', 'like', Session::get('poseealumnocreate_search') . '%')->orWhere('ALU_PATERNO','like',  Session::get('poseealumnocreate_search') . '%')
->orderBy(Session::get('poseealumnocreate_field'), Session::get('poseealumnocreate_sort'))
        ->paginate(500);
                        

        $poseealumno = posee::alumno();
         $poseeBENEFICIO = posee::BENEFICIO();
         $posee = posee::all();
        $alumno=alumno::all();
        $BENEFICIO = BENEFICIO::all();


return view('posee3.list2create',compact('poseealumnolist','poseealumno','poseeBENEFICIO','posee','alumno','BENEFICIO'));


    }



    public function getList3create($id)
    {
          Session::put('poseeBENEFICIOcreate_search', Input::has('ok') ? Input::get('search') : (Session::has('poseeBENEFICIOcreate_search') ? Session::get('poseeBENEFICIOcreate_search') : ''));
        Session::put('poseeBENEFICIOcreate_field', Input::has('field') ? Input::get('field') : (Session::has('poseeBENEFICIOcreate_field') ? Session::get('poseeBENEFICIOcreate_field') : 'BEN_NOMBRE'));
        Session::put('poseeBENEFICIOcreate_sort', Input::has('sort') ? Input::get('sort') : (Session::has('poseeBENEFICIOcreate_sort') ? Session::get('poseeBENEFICIOcreate_sort') : 'asc'));
        $poseeBENEFICIOlist = BENEFICIO::where('BEN_NOMBRE', 'like', '%' . Session::get('poseeBENEFICIOcreate_search') . '%')
            ->orderBy(Session::get('poseeBENEFICIOcreate_field'), Session::get('poseeBENEFICIOcreate_sort'))->paginate(20);





                return view('posee3.list3create',compact('poseeBENEFICIOlist','id'));

    }


     public function getCreate($id,$BENEFICIO_id)
    {

//            $BENEFICIO = BENEFICIO::lists('BEN_NOMBRE', 'id');
                        //$alumno = alumno::lists('id', 'id');

$beneficio=beneficio::where('id', '=', $BENEFICIO_id)
                ->first();
          $alumno = alumno::where('id', '=', $id)
                ->first();

        return view('posee3.create',compact('beneficio','alumno','BENEFICIO_id','id'));
    }

      public function postCreate($id,$BENEFICIO_id)
    {
                $posee= DB::table('POSEE')->where('id',$id)->where('BENEFICIO_id',$BENEFICIO_id)->delete();

        $validator = Validator::make(Input::all(), [
            'id' => 'required|cl_rut','id' => 'required']);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
        $posee = new posee();
   $posee->id = Input::get('id');
                                                $posee->BENEFICIO_id = Input::get('BENEFICIO_id');


        $posee->save();
        return ['url' => 'posee3/list'];
    }






   

    public function getList2update($id,$BENEFICIO_id,$idviejo,$BENEFICIO_idviejo)
    {
         Session::put('poseealumnoupdate_search', Input::has('ok') ? Input::get('search') : (Session::has('poseealumnoupdate_search') ? Session::get('poseealumnoupdate_search') : ''));
        Session::put('poseealumnoupdate_field', Input::has('field') ? Input::get('field') : (Session::has('poseealumnoupdate_field') ? Session::get('poseealumnoupdate_field') : 'id'));
        Session::put('poseealumnoupdate_sort', Input::has('sort') ? Input::get('sort') : (Session::has('poseealumnoupdate_sort') ? Session::get('poseealumnoupdate_sort') : 'asc'));
        $poseealumnolist = alumno::where('id', 'like', Session::get('poseealumnoupdate_search') . '%')->orWhere('ALU_PATERNO','like',  Session::get('poseealumnoupdate_search') . '%')
->orderBy(Session::get('poseealumnoupdate_field'), Session::get('poseealumnoupdate_sort'))
        ->paginate(500);
                      



                return view('posee3.list2update',compact('poseealumnolist','id','BENEFICIO_id','idviejo','BENEFICIO_idviejo'));


    }




    public function getList3update($id,$BENEFICIO_id,$idviejo,$BENEFICIO_idviejo)
    {
       Session::put('poseeBENEFICIOupdate_search', Input::has('ok') ? Input::get('search') : (Session::has('poseeBENEFICIOupdate_search') ? Session::get('poseeBENEFICIOupdate_search') : ''));
        Session::put('poseeBENEFICIOupdate_field', Input::has('field') ? Input::get('field') : (Session::has('poseeBENEFICIOupdate_field') ? Session::get('poseeBENEFICIOupdate_field') : 'BEN_NOMBRE'));
        Session::put('poseeBENEFICIOupdate_sort', Input::has('sort') ? Input::get('sort') : (Session::has('poseeBENEFICIOupdate_sort') ? Session::get('poseeBENEFICIOupdate_sort') : 'asc'));
        $poseeBENEFICIOlist = BENEFICIO::where('BEN_NOMBRE', 'like', '%' . Session::get('poseeBENEFICIOupdate_search') . '%')
            ->orderBy(Session::get('poseeBENEFICIOupdate_field'), Session::get('poseeBENEFICIOupdate_sort'))->paginate(20);





                return view('posee3.list3update',compact('poseeBENEFICIOlist','id','BENEFICIO_id','idviejo','BENEFICIO_idviejo'));

    }



 public function getUpdate3($id,$BENEFICIO_id,$idviejo,$BENEFICIO_idviejo)
    {

          $beneficio=beneficio::where('id', '=', $BENEFICIO_id)
                ->first();
          $alumno = alumno::where('id', '=', $id)
                ->first();

                         $posee=posee::all();

    
        return view('posee3.update3',compact('posee','beneficio','alumno','id','BENEFICIO_id','idviejo','BENEFICIO_idviejo'));
    }

    public function postUpdate3($id,$BENEFICIO_id,$idviejo,$BENEFICIO_idviejo)
    {
            $poseeviejo= DB::table('POSEE')->where('id',$idviejo)->where('BENEFICIO_id',$BENEFICIO_idviejo)->delete();
            $posee= DB::table('POSEE')->where('id',$id)->where('BENEFICIO_id',$BENEFICIO_id)->delete();

         $validator = Validator::make(Input::all(), [
            'id' => 'required|cl_rut','id' => 'required']);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
        $posee = new posee();
   $posee->id = Input::get('id');
                                                $posee->BENEFICIO_id = Input::get('BENEFICIO_id');


        $posee->save();
        return ['url' => 'posee3/list'];
    }




    public function getDelete($id,$BENEFICIO_id)
    {


 
    DB::table('POSEE')->where('id',$id)->where('BENEFICIO_id',$BENEFICIO_id)->delete();
        return Redirect('posee3/list');
    }



public function getShow2($id,$BENEFICIO_id)
    {
$alumno= alumno::paginate();
                         $BENEFICIO=BENEFICIO::all();
                                                  $alumno=alumno::all();

                         $posee=posee::all();



        return view('posee3.show2',compact('alumno','id','BENEFICIO_id','BENEFICIO','alumno','posee','alumno'));    }



        public function getShowalumnocreate($id)
    {
$alumno= alumno::paginate();
                    $UNIVERSIDAD = alumno::UNIVERSIDAD();

        return view('posee3.showalumnocreate',compact('alumno','id','UNIVERSIDAD'));    }


        public function getShowbeneficiocreate($id,$con_id)
    {
$BENEFICIO= BENEFICIO::paginate();

        return view('posee3.showBENEFICIOcreate',compact('BENEFICIO','id','con_id'));    }


                  public function getShowalumnoupdate($id,$BENEFICIO_id,$idviejo,$BENEFICIO_idviejo)
    {
$alumno= alumno::paginate();
                    $UNIVERSIDAD = alumno::UNIVERSIDAD();

        return view('posee3.showalumnoupdate',compact('alumno','id','UNIVERSIDAD','BENEFICIO_id','idviejo','BENEFICIO_idviejo'));    }


        public function getShowbeneficioupdate($id,$BENEFICIO_id,$idviejo,$BENEFICIO_idviejo)
    {
$BENEFICIO= BENEFICIO::paginate();

        return view('posee3.showBENEFICIOupdate',compact('BENEFICIO','id','BENEFICIO_id','idviejo','BENEFICIO_idviejo'));    }


} 
