<?php
namespace Magister\Http\Controllers;

use Magister\Asiste;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Magister\CONis;
use Magister\Profesor;
use Magister\Alumno;

use Magister\Congreso;
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



class Asiste3Controller extends Controller
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
        return view('asiste3.index');
    }

    public function getList()
    {
         Session::put('asiste3_search', Input::has('ok') ? Input::get('search') : (Session::has('asiste3_search') ? Session::get('asiste3_search') : ''));
        Session::put('asiste3_field', Input::has('field') ? Input::get('field') : (Session::has('asiste3_field') ? Session::get('asiste3_field') : 'id'));
        Session::put('asiste3_sort', Input::has('sort') ? Input::get('sort') : (Session::has('asiste3_sort') ? Session::get('asiste3_sort') : 'asc'));
        $asistealumnolist = alumno::where('id', 'like', Session::get('asiste3_search') . '%')->orWhere('ALU_PATERNO','like',  Session::get('asiste3_search') . '%')
->orderBy(Session::get('asiste3_field'), Session::get('asiste3_sort'))
        ->paginate(500);

                        $asitealumno = asiste::alumno();

$asistecongreso = asiste::congreso();

                        $congreso = congreso::all();
                                                $alumno = alumno::all();


$asiste = asiste::all();




 return view('asiste3.list',compact('asistealumnolist','asistealumno','asistecongreso','congreso','alumno','asiste'));


    }



   public function getList2create()
    {
               Session::put('asistealumnocreate_search', Input::has('ok') ? Input::get('search') : (Session::has('asistealumnocreate_search') ? Session::get('asistealumnocreate_search') : ''));
        Session::put('asistealumnocreate_field', Input::has('field') ? Input::get('field') : (Session::has('asistealumnocreate_field') ? Session::get('asistealumnocreate_field') : 'id'));
        Session::put('asistealumnocreate_sort', Input::has('sort') ? Input::get('sort') : (Session::has('asistealumnocreate_sort') ? Session::get('asistealumnocreate_sort') : 'asc'));
        $asistealumnolist = alumno::where('id', 'like', Session::get('asistealumnocreate_search') . '%')->orWhere('ALU_PATERNO','like',  Session::get('asistealumnocreate_search') . '%')
->orderBy(Session::get('asistealumnocreate_field'), Session::get('asistealumnocreate_sort'))
        ->paginate(500);
                        

        $asistealumno = asiste::alumno();
         $asistecongreso = asiste::congreso();
         $asiste = asiste::all();
        $alumno=alumno::all();
        $congreso = congreso::all();


return view('asiste3.list2create',compact('asistealumnolist','asistealumno','asistecongreso','asiste','alumno','congreso'));


    }



    public function getList3create($id)
    {
          Session::put('asistecongresocreate_search', Input::has('ok') ? Input::get('search') : (Session::has('asistecongresocreate_search') ? Session::get('asistecongresocreate_search') : ''));
        Session::put('asistecongresocreate_field', Input::has('field') ? Input::get('field') : (Session::has('asistecongresocreate_field') ? Session::get('asistecongresocreate_field') : 'CON_NOMBRE'));
        Session::put('asistecongresocreate_sort', Input::has('sort') ? Input::get('sort') : (Session::has('asistecongresocreate_sort') ? Session::get('asistecongresocreate_sort') : 'asc'));
        $asistecongresolist = congreso::where('CON_NOMBRE', 'like', '%' . Session::get('asistecongresocreate_search') . '%')
                            ->orWhere('CON_CIUDAD','like',  Session::get('asistecongresocreate_search') . '%')

            ->orderBy(Session::get('asistecongresocreate_field'), Session::get('asistecongresocreate_sort'))->paginate(20);





                return view('asiste3.list3create',compact('asistecongresolist','id'));

    }


     public function getCreate($id,$CONGRESO_id)
    {

  //          $congreso = congreso::lists('CON_NOMBRE', 'id');
//                        $alumno = alumno::lists('id', 'id');

$congreso=congreso::where('id', '=', $CONGRESO_id)
                ->first();
          $alumno = alumno::where('id', '=', $id)
                ->first();

        return view('asiste3.create',compact('congreso','alumno','CONGRESO_id','id'));
    }

      public function postCreate($id,$CONGRESO_id)
    {
                $asiste= DB::table('ASISTE')->where('id',$id)->where('CONGRESO_id',$CONGRESO_id)->delete();

        $validator = Validator::make(Input::all(), [
            'id' => 'required|cl_rut','id' => 'required']);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
        $asiste = new asiste();
   $asiste->id = Input::get('id');
                                                $asiste->CONGRESO_id = Input::get('CONGRESO_id');


        $asiste->save();
        return ['url' => 'asiste3/list'];
    }






   

    public function getList2update($id,$CONGRESO_id,$idviejo,$CONGRESO_idviejo)
    {
         Session::put('asistealumnoupdate_search', Input::has('ok') ? Input::get('search') : (Session::has('asistealumnoupdate_search') ? Session::get('asistealumnoupdate_search') : ''));
        Session::put('asistealumnoupdate_field', Input::has('field') ? Input::get('field') : (Session::has('asistealumnoupdate_field') ? Session::get('asistealumnoupdate_field') : 'id'));
        Session::put('asistealumnoupdate_sort', Input::has('sort') ? Input::get('sort') : (Session::has('asistealumnoupdate_sort') ? Session::get('asistealumnoupdate_sort') : 'asc'));
        $asistealumnolist = alumno::where('id', 'like', Session::get('asistealumnoupdate_search') . '%')->orWhere('ALU_PATERNO','like',  Session::get('asistealumnoupdate_search') . '%')
->orderBy(Session::get('asistealumnoupdate_field'), Session::get('asistealumnoupdate_sort'))
        ->paginate(500);
                      



                return view('asiste3.list2update',compact('asistealumnolist','id','CONGRESO_id','idviejo','CONGRESO_idviejo'));


    }




    public function getList3update($id,$CONGRESO_id,$idviejo,$CONGRESO_idviejo)
    {
       Session::put('asistecongresoupdate_search', Input::has('ok') ? Input::get('search') : (Session::has('asistecongresoupdate_search') ? Session::get('asistecongresoupdate_search') : ''));
        Session::put('asistecongresoupdate_field', Input::has('field') ? Input::get('field') : (Session::has('asistecongresoupdate_field') ? Session::get('asistecongresoupdate_field') : 'CON_NOMBRE'));
        Session::put('asistecongresoupdate_sort', Input::has('sort') ? Input::get('sort') : (Session::has('asistecongresoupdate_sort') ? Session::get('asistecongresoupdate_sort') : 'asc'));
        $asistecongresolist = congreso::where('CON_NOMBRE', 'like', '%' . Session::get('asistecongresoupdate_search') . '%')
                                    ->orWhere('CON_CIUDAD','like',  Session::get('asistecongresoupdate_search') . '%')

            ->orderBy(Session::get('asistecongresoupdate_field'), Session::get('asistecongresoupdate_sort'))->paginate(20);





                return view('asiste3.list3update',compact('asistecongresolist','id','CONGRESO_id','idviejo','CONGRESO_idviejo'));

    }



 public function getUpdate3($id,$CONGRESO_id,$idviejo,$CONGRESO_idviejo)
    {

            //$congreso = congreso::lists('CON_NOMBRE', 'id');
                        //$alumno = alumno::lists('ALU_NOMBRES', 'id');

$congreso=congreso::where('id', '=', $CONGRESO_id)
                ->first();
          $alumno = alumno::where('id', '=', $id)
                ->first();

                         $asiste=asiste::all();

    
        return view('asiste3.update3',compact('asiste','congreso','alumno','id','CONGRESO_id','idviejo','CONGRESO_idviejo'));
    }

    public function postUpdate3($id,$CONGRESO_id,$idviejo,$CONGRESO_idviejo)
    {
            $asisteviejo= DB::table('ASISTE')->where('id',$idviejo)->where('CONGRESO_id',$CONGRESO_idviejo)->delete();
            $asiste= DB::table('ASISTE')->where('id',$id)->where('CONGRESO_id',$CONGRESO_id)->delete();

         $validator = Validator::make(Input::all(), [
            'id' => 'required|cl_rut','id' => 'required']);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
        $asiste = new asiste();
   $asiste->id = Input::get('id');
                                                $asiste->CONGRESO_id = Input::get('CONGRESO_id');


        $asiste->save();
        return ['url' => 'asiste3/list'];
    }




    public function getDelete($id,$CONGRESO_id)
    {


 
    DB::table('ASISTE')->where('id',$id)->where('CONGRESO_id',$CONGRESO_id)->delete();
        return Redirect('asiste3/list');
    }



public function getShow2($id,$CONGRESO_id)
    {
$alumno= alumno::paginate();
                         $congreso=congreso::all();
                                                  $alumno=alumno::all();

                         $asiste=asiste::all();



        return view('asiste3.show2',compact('alumno','id','CONGRESO_id','congreso','alumno','asiste','alumno'));    }



        public function getShowalumnocreate($id)
    {
$alumno= alumno::paginate();
                    $UNIVERSIDAD = alumno::UNIVERSIDAD();

        return view('asiste3.showalumnocreate',compact('alumno','id','UNIVERSIDAD'));    }


        public function getShowcongresocreate($id,$con_id)
    {
$congreso= congreso::paginate();

        return view('asiste3.showcongresocreate',compact('congreso','id','con_id'));    }


                  public function getShowalumnoupdate($id,$CONGRESO_id,$idviejo,$CONGRESO_idviejo)
    {
$alumno= alumno::paginate();
                    $UNIVERSIDAD = alumno::UNIVERSIDAD();

        return view('asiste3.showalumnoupdate',compact('alumno','id','UNIVERSIDAD','CONGRESO_id','idviejo','CONGRESO_idviejo'));    }


        public function getShowcongresoupdate($id,$CONGRESO_id,$idviejo,$CONGRESO_idviejo)
    {
$congreso= congreso::paginate();

        return view('asiste3.showcongresoupdate',compact('congreso','id','CONGRESO_id','idviejo','CONGRESO_idviejo'));    }


} 
