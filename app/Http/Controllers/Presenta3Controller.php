<?php
namespace Magister\Http\Controllers;

use Magister\Presenta;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Magister\Tesis;
use Magister\Profesor;
use Magister\Alumno;

use Magister\Solicitud;
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



class Presenta3Controller extends Controller
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
        return view('presenta3.index');
    }

    public function getList()
    {
         Session::put('presenta_search', Input::has('ok') ? Input::get('search') : (Session::has('presenta_search') ? Session::get('presenta_search') : ''));
        Session::put('presenta_field', Input::has('field') ? Input::get('field') : (Session::has('presenta_field') ? Session::get('presenta_field') : 'id'));
        Session::put('presenta_sort', Input::has('sort') ? Input::get('sort') : (Session::has('presenta_sort') ? Session::get('presenta_sort') : 'asc'));
        $presentaalumnolist = alumno::where('id', 'like', Session::get('presenta_search') . '%')->orWhere('ALU_PATERNO','like',  Session::get('presenta_search') . '%')
->orderBy(Session::get('presenta_field'), Session::get('presenta_sort'))
        ->paginate(500);

                        $asitealumno = presenta::alumno();

$presentaSOLICITUD = presenta::SOLICITUD();

                        $SOLICITUD = SOLICITUD::all();
                                                $alumno = alumno::all();


$presenta = presenta::all();




 return view('presenta3.list',compact('presentaalumnolist','presentaalumno','presentaSOLICITUD','SOLICITUD','alumno','presenta'));


    }



   public function getList2create()
    {
               Session::put('presentaalumnocreate_search', Input::has('ok') ? Input::get('search') : (Session::has('presentaalumnocreate_search') ? Session::get('presentaalumnocreate_search') : ''));
        Session::put('presentaalumnocreate_field', Input::has('field') ? Input::get('field') : (Session::has('presentaalumnocreate_field') ? Session::get('presentaalumnocreate_field') : 'id'));
        Session::put('presentaalumnocreate_sort', Input::has('sort') ? Input::get('sort') : (Session::has('presentaalumnocreate_sort') ? Session::get('presentaalumnocreate_sort') : 'asc'));
        $presentaalumnolist = alumno::where('id', 'like', Session::get('presentaalumnocreate_search') . '%')->orWhere('ALU_PATERNO','like',  Session::get('presentaalumnocreate_search') . '%')
->orderBy(Session::get('presentaalumnocreate_field'), Session::get('presentaalumnocreate_sort'))
        ->paginate(500);
                        

        $presentaalumno = presenta::alumno();
         $presentaSOLICITUD = presenta::SOLICITUD();
         $presenta = presenta::all();
        $alumno=alumno::all();
        $SOLICITUD = SOLICITUD::all();


return view('presenta3.list2create',compact('presentaalumnolist','presentaalumno','presentaSOLICITUD','presenta','alumno','SOLICITUD'));


    }



    public function getList3create($id)
    {
          Session::put('presentaSOLICITUDcreate_search', Input::has('ok') ? Input::get('search') : (Session::has('presentaSOLICITUDcreate_search') ? Session::get('presentaSOLICITUDcreate_search') : ''));
        Session::put('presentaSOLICITUDcreate_field', Input::has('field') ? Input::get('field') : (Session::has('presentaSOLICITUDcreate_field') ? Session::get('presentaSOLICITUDcreate_field') : 'SOL_NOMBRE'));
        Session::put('presentaSOLICITUDcreate_sort', Input::has('sort') ? Input::get('sort') : (Session::has('presentaSOLICITUDcreate_sort') ? Session::get('presentaSOLICITUDcreate_sort') : 'asc'));
        $presentaSOLICITUDlist = SOLICITUD::where('SOL_NOMBRE', 'like', '%' . Session::get('presentaSOLICITUDcreate_search') . '%')
                            ->orWhere('SOL_ANO','like',  Session::get('presentaSOLICITUDcreate_search') . '%')

            ->orderBy(Session::get('presentaSOLICITUDcreate_field'), Session::get('presentaSOLICITUDcreate_sort'))->paginate(20);





                return view('presenta3.list3create',compact('presentaSOLICITUDlist','id'));

    }


     public function getCreate($id,$SOLICITUD_id)
    {

            //$SOLICITUD = SOLICITUD::lists('SOL_NOMBRE', 'id');
                       // $alumno = alumno::lists('id', 'id');

$solicitud=solicitud::where('id', '=', $SOLICITUD_id)
                ->first();
          $alumno = alumno::where('id', '=', $id)
                ->first();

        return view('presenta3.create',compact('solicitud','alumno','SOLICITUD_id','id'));
    }

      public function postCreate($id,$SOLICITUD_id)
    {
                $presenta= DB::table('PRESENTA')->where('id',$id)->where('SOLICITUD_id',$SOLICITUD_id)->delete();

        $validator = Validator::make(Input::all(), [
            'id' => 'required|cl_rut','id' => 'required']);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
        $presenta = new presenta();
   $presenta->id = Input::get('id');
                                                $presenta->SOLICITUD_id = Input::get('SOLICITUD_id');


        $presenta->save();
        return ['url' => 'presenta3/list'];
    }






   

    public function getList2update($id,$SOLICITUD_id,$idviejo,$SOLICITUD_idviejo)
    {
         Session::put('presentaalumnoupdate_search', Input::has('ok') ? Input::get('search') : (Session::has('presentaalumnoupdate_search') ? Session::get('presentaalumnoupdate_search') : ''));
        Session::put('presentaalumnoupdate_field', Input::has('field') ? Input::get('field') : (Session::has('presentaalumnoupdate_field') ? Session::get('presentaalumnoupdate_field') : 'id'));
        Session::put('presentaalumnoupdate_sort', Input::has('sort') ? Input::get('sort') : (Session::has('presentaalumnoupdate_sort') ? Session::get('presentaalumnoupdate_sort') : 'asc'));
        $presentaalumnolist = alumno::where('id', 'like', Session::get('presentaalumnoupdate_search') . '%')->orWhere('ALU_PATERNO','like',  Session::get('presentaalumnoupdate_search') . '%')
->orderBy(Session::get('presentaalumnoupdate_field'), Session::get('presentaalumnoupdate_sort'))
        ->paginate(1000);
                      



                return view('presenta3.list2update',compact('presentaalumnolist','id','SOLICITUD_id','idviejo','SOLICITUD_idviejo'));


    }




    public function getList3update($id,$SOLICITUD_id,$idviejo,$SOLICITUD_idviejo)
    {
       Session::put('presentaSOLICITUDupdate_search', Input::has('ok') ? Input::get('search') : (Session::has('presentaSOLICITUDupdate_search') ? Session::get('presentaSOLICITUDupdate_search') : ''));
        Session::put('presentaSOLICITUDupdate_field', Input::has('field') ? Input::get('field') : (Session::has('presentaSOLICITUDupdate_field') ? Session::get('presentaSOLICITUDupdate_field') : 'SOL_NOMBRE'));
        Session::put('presentaSOLICITUDupdate_sort', Input::has('sort') ? Input::get('sort') : (Session::has('presentaSOLICITUDupdate_sort') ? Session::get('presentaSOLICITUDupdate_sort') : 'asc'));
        $presentaSOLICITUDlist = SOLICITUD::where('SOL_NOMBRE', 'like', '%' . Session::get('presentaSOLICITUDupdate_search') . '%')
                                    ->orWhere('SOL_ANO','like',  Session::get('presentaSOLICITUDupdate_search') . '%')

            ->orderBy(Session::get('presentaSOLICITUDupdate_field'), Session::get('presentaSOLICITUDupdate_sort'))->paginate(20);





                return view('presenta3.list3update',compact('presentaSOLICITUDlist','id','SOLICITUD_id','idviejo','SOLICITUD_idviejo'));

    }



 public function getUpdate3($id,$SOLICITUD_id,$idviejo,$SOLICITUD_idviejo)
    {

         
$solicitud=solicitud::where('id', '=', $SOLICITUD_id)
                ->first();
          $alumno = alumno::where('id', '=', $id)
                ->first();

                         $presenta=presenta::all();

    
        return view('presenta3.update3',compact('presenta','solicitud','alumno','id','SOLICITUD_id','idviejo','SOLICITUD_idviejo'));
    }

    public function postUpdate3($id,$SOLICITUD_id,$idviejo,$SOLICITUD_idviejo)
    {
            $presentaviejo= DB::table('PRESENTA')->where('id',$idviejo)->where('SOLICITUD_id',$SOLICITUD_idviejo)->delete();
            $presenta= DB::table('PRESENTA')->where('id',$id)->where('SOLICITUD_id',$SOLICITUD_id)->delete();

         $validator = Validator::make(Input::all(), [
            'id' => 'required|cl_rut','id' => 'required']);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
        $presenta = new presenta();
   $presenta->id = Input::get('id');
                                                $presenta->SOLICITUD_id = Input::get('SOLICITUD_id');


        $presenta->save();
        return ['url' => 'presenta3/list'];
    }




    public function getDelete($id,$SOLICITUD_id)
    {


 
    DB::table('PRESENTA')->where('id',$id)->where('SOLICITUD_id',$SOLICITUD_id)->delete();
        return Redirect('presenta3/list');
    }



public function getShow2($id,$SOLICITUD_id)
    {
$alumno= alumno::paginate();
                         $SOLICITUD=SOLICITUD::all();
                                                  $alumno=alumno::all();

                         $presenta=presenta::all();



        return view('presenta3.show2',compact('alumno','id','SOLICITUD_id','SOLICITUD','alumno','presenta','alumno'));    }



        public function getShowalumnocreate($id)
    {
$alumno= alumno::paginate();
                    $UNIVERSIDAD = alumno::UNIVERSIDAD();

        return view('presenta3.showalumnocreate',compact('alumno','id','UNIVERSIDAD'));    }


        public function getShowsolicitudcreate($id,$con_id)
    {
$SOLICITUD= SOLICITUD::paginate();

        return view('presenta3.showSOLICITUDcreate',compact('SOLICITUD','id','con_id'));    }


                  public function getShowalumnoupdate($id,$SOLICITUD_id,$idviejo,$SOLICITUD_idviejo)
    {
$alumno= alumno::paginate();
                    $UNIVERSIDAD = alumno::UNIVERSIDAD();

        return view('presenta3.showalumnoupdate',compact('alumno','id','UNIVERSIDAD','SOLICITUD_id','idviejo','SOLICITUD_idviejo'));    }


        public function getShowsolicitudupdate($id,$SOLICITUD_id,$idviejo,$SOLICITUD_idviejo)
    {
$SOLICITUD= SOLICITUD::paginate();

        return view('presenta3.showSOLICITUDupdate',compact('SOLICITUD','id','SOLICITUD_id','idviejo','SOLICITUD_idviejo'));    }


} 
