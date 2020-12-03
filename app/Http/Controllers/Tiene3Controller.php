<?php
namespace Magister\Http\Controllers;

use Magister\Tiene;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Magister\Tesis;
use Magister\Profesor;
use Magister\Alumno;

use Magister\Trabajo;
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



class Tiene3Controller extends Controller
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
        return view('tiene3.index');
    }

    public function getList()
    {
         Session::put('tiene_search', Input::has('ok') ? Input::get('search') : (Session::has('tiene_search') ? Session::get('tiene_search') : ''));
        Session::put('tiene_field', Input::has('field') ? Input::get('field') : (Session::has('tiene_field') ? Session::get('tiene_field') : 'id'));
        Session::put('tiene_sort', Input::has('sort') ? Input::get('sort') : (Session::has('tiene_sort') ? Session::get('tiene_sort') : 'asc'));
        $tienealumnolist = alumno::where('id', 'like', Session::get('tiene_search') . '%')->orWhere('ALU_PATERNO','like',  Session::get('tiene_search') . '%')
->orderBy(Session::get('tiene_field'), Session::get('tiene_sort'))
        ->paginate(500);

                        $asitealumno = tiene::alumno();

$tieneTRABAJO = tiene::TRABAJO();

                        $TRABAJO = TRABAJO::all();
                                                $alumno = alumno::all();


$tiene = tiene::all();




 return view('tiene3.list',compact('tienealumnolist','tienealumno','tieneTRABAJO','TRABAJO','alumno','tiene'));


    }



   public function getList2create()
    {
               Session::put('tienealumnocreate_search', Input::has('ok') ? Input::get('search') : (Session::has('tienealumnocreate_search') ? Session::get('tienealumnocreate_search') : ''));
        Session::put('tienealumnocreate_field', Input::has('field') ? Input::get('field') : (Session::has('tienealumnocreate_field') ? Session::get('tienealumnocreate_field') : 'id'));
        Session::put('tienealumnocreate_sort', Input::has('sort') ? Input::get('sort') : (Session::has('tienealumnocreate_sort') ? Session::get('tienealumnocreate_sort') : 'asc'));
        $tienealumnolist = alumno::where('id', 'like', Session::get('tienealumnocreate_search') . '%')->orWhere('ALU_PATERNO','like',  Session::get('tienealumnocreate_search') . '%')
->orderBy(Session::get('tienealumnocreate_field'), Session::get('tienealumnocreate_sort'))
        ->paginate(500);
                        

        $tienealumno = tiene::alumno();
         $tieneTRABAJO = tiene::TRABAJO();
         $tiene = tiene::all();
        $alumno=alumno::all();
        $TRABAJO = TRABAJO::all();


return view('tiene3.list2create',compact('tienealumnolist','tienealumno','tieneTRABAJO','tiene','alumno','TRABAJO'));


    }



    public function getList3create($id)
    {
          Session::put('tieneTRABAJOcreate_search', Input::has('ok') ? Input::get('search') : (Session::has('tieneTRABAJOcreate_search') ? Session::get('tieneTRABAJOcreate_search') : ''));
        Session::put('tieneTRABAJOcreate_field', Input::has('field') ? Input::get('field') : (Session::has('tieneTRABAJOcreate_field') ? Session::get('tieneTRABAJOcreate_field') : 'TRA_NOMBRE'));
        Session::put('tieneTRABAJOcreate_sort', Input::has('sort') ? Input::get('sort') : (Session::has('tieneTRABAJOcreate_sort') ? Session::get('tieneTRABAJOcreate_sort') : 'asc'));
        $tieneTRABAJOlist = TRABAJO::where('TRA_NOMBRE', 'like', '%' . Session::get('tieneTRABAJOcreate_search') . '%')
                    ->orWhere('TRA_EMPRESA','like',  Session::get('tieneTRABAJOcreate_search') . '%')

            ->orderBy(Session::get('tieneTRABAJOcreate_field'), Session::get('tieneTRABAJOcreate_sort'))->paginate(20);





                return view('tiene3.list3create',compact('tieneTRABAJOlist','id'));

    }


     public function getCreate($id,$TRABAJO_id)
    {

          $trabajo=trabajo::where('id', '=', $TRABAJO_id)
                ->first();
          $alumno = alumno::where('id', '=', $id)
                ->first();

        return view('tiene3.create',compact('trabajo','alumno','TRABAJO_id','id'));
    }

      public function postCreate($id,$TRABAJO_id)
    {
                $tiene= DB::table('TIENE')->where('id',$id)->where('TRABAJO_id',$TRABAJO_id)->delete();

        $validator = Validator::make(Input::all(), [
            'id' => 'required|cl_rut','id' => 'required']);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
        $tiene = new tiene();
   $tiene->id = Input::get('id');
                                                $tiene->TRABAJO_id = Input::get('TRABAJO_id');


        $tiene->save();
        return ['url' => 'tiene3/list'];
    }






   

    public function getList2update($id,$TRABAJO_id,$idviejo,$TRABAJO_idviejo)
    {
         Session::put('tienealumnoupdate_search', Input::has('ok') ? Input::get('search') : (Session::has('tienealumnoupdate_search') ? Session::get('tienealumnoupdate_search') : ''));
        Session::put('tienealumnoupdate_field', Input::has('field') ? Input::get('field') : (Session::has('tienealumnoupdate_field') ? Session::get('tienealumnoupdate_field') : 'id'));
        Session::put('tienealumnoupdate_sort', Input::has('sort') ? Input::get('sort') : (Session::has('tienealumnoupdate_sort') ? Session::get('tienealumnoupdate_sort') : 'asc'));
        $tienealumnolist = alumno::where('id', 'like', Session::get('tienealumnoupdate_search') . '%')->orWhere('ALU_PATERNO','like',  Session::get('tienealumnoupdate_search') . '%')
->orderBy(Session::get('tienealumnoupdate_field'), Session::get('tienealumnoupdate_sort'))
        ->paginate(500);
                      



                return view('tiene3.list2update',compact('tienealumnolist','id','TRABAJO_id','idviejo','TRABAJO_idviejo'));


    }




    public function getList3update($id,$TRABAJO_id,$idviejo,$TRABAJO_idviejo)
    {
       Session::put('tieneTRABAJOupdate_search', Input::has('ok') ? Input::get('search') : (Session::has('tieneTRABAJOupdate_search') ? Session::get('tieneTRABAJOupdate_search') : ''));
        Session::put('tieneTRABAJOupdate_field', Input::has('field') ? Input::get('field') : (Session::has('tieneTRABAJOupdate_field') ? Session::get('tieneTRABAJOupdate_field') : 'TRA_NOMBRE'));
        Session::put('tieneTRABAJOupdate_sort', Input::has('sort') ? Input::get('sort') : (Session::has('tieneTRABAJOupdate_sort') ? Session::get('tieneTRABAJOupdate_sort') : 'asc'));
        $tieneTRABAJOlist = TRABAJO::where('TRA_NOMBRE', 'like', '%' . Session::get('tieneTRABAJOupdate_search') . '%')
                            ->orWhere('TRA_EMPRESA','like',  Session::get('tieneTRABAJOupdate_search') . '%')

            ->orderBy(Session::get('tieneTRABAJOupdate_field'), Session::get('tieneTRABAJOupdate_sort'))->paginate(20);





                return view('tiene3.list3update',compact('tieneTRABAJOlist','id','TRABAJO_id','idviejo','TRABAJO_idviejo'));

    }



 public function getUpdate3($id,$TRABAJO_id,$idviejo,$TRABAJO_idviejo)
    {

           // $TRABAJO = TRABAJO::lists('TRA_NOMBRE', 'id');
                    //    $alumno = alumno::lists('id', 'id');


$trabajo=trabajo::where('id', '=', $TRABAJO_id)
                ->first();
          $alumno = alumno::where('id', '=', $id)
                ->first();
         

                         $tiene=tiene::all();

    
        return view('tiene3.update3',compact('tiene','trabajo','alumno','id','TRABAJO_id','idviejo','TRABAJO_idviejo'));
    }

    public function postUpdate3($id,$TRABAJO_id,$idviejo,$TRABAJO_idviejo)
    {
            $tieneviejo= DB::table('TIENE')->where('id',$idviejo)->where('TRABAJO_id',$TRABAJO_idviejo)->delete();
            $tiene= DB::table('TIENE')->where('id',$id)->where('TRABAJO_id',$TRABAJO_id)->delete();

         $validator = Validator::make(Input::all(), [
            'id' => 'required|cl_rut','id' => 'required']);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
        $tiene = new tiene();
   $tiene->id = Input::get('id');
                                                $tiene->TRABAJO_id = Input::get('TRABAJO_id');


        $tiene->save();
        return ['url' => 'tiene3/list'];
    }




    public function getDelete($id,$TRABAJO_id)
    {


 
    DB::table('TIENE')->where('id',$id)->where('TRABAJO_id',$TRABAJO_id)->delete();
        return Redirect('tiene3/list');
    }



public function getShow2($id,$TRABAJO_id)
    {
$alumno= alumno::paginate();
                         $TRABAJO=TRABAJO::all();
                                                  $alumno=alumno::all();

                         $tiene=tiene::all();



        return view('tiene3.show2',compact('alumno','id','TRABAJO_id','TRABAJO','alumno','tiene','alumno'));    }



        public function getShowalumnocreate($id)
    {
$alumno= alumno::paginate();
                    $UNIVERSIDAD = alumno::UNIVERSIDAD();

        return view('tiene3.showalumnocreate',compact('alumno','id','UNIVERSIDAD'));    }


        public function getShowtrabajocreate($id,$con_id)
    {
$TRABAJO= TRABAJO::paginate();

        return view('tiene3.showTRABAJOcreate',compact('TRABAJO','id','con_id'));    }


                  public function getShowalumnoupdate($id,$TRABAJO_id,$idviejo,$TRABAJO_idviejo)
    {
$alumno= alumno::paginate();
                    $UNIVERSIDAD = alumno::UNIVERSIDAD();

        return view('tiene3.showalumnoupdate',compact('alumno','id','UNIVERSIDAD','TRABAJO_id','idviejo','TRABAJO_idviejo'));    }


        public function getShowtrabajoupdate($id,$TRABAJO_id,$idviejo,$TRABAJO_idviejo)
    {
$TRABAJO= TRABAJO::paginate();

        return view('tiene3.showTRABAJOupdate',compact('TRABAJO','id','TRABAJO_id','idviejo','TRABAJO_idviejo'));    }


} 
