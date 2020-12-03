<?php
namespace Magister\Http\Controllers;

use Magister\Participa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Magister\Tesis;
use Magister\Profesor;
use Magister\Alumno;

use Magister\Taller;
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



class Participa3Controller extends Controller
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
        return view('participa3.index');
    }

    public function getList()
    {
         Session::put('participa_search', Input::has('ok') ? Input::get('search') : (Session::has('participa_search') ? Session::get('participa_search') : ''));
        Session::put('participa_field', Input::has('field') ? Input::get('field') : (Session::has('participa_field') ? Session::get('participa_field') : 'ALU_PATERNO'));
        Session::put('participa_sort', Input::has('sort') ? Input::get('sort') : (Session::has('participa_sort') ? Session::get('participa_sort') : 'asc'));
        $participaalumnolist = alumno::where('id', 'like', Session::get('participa_search') . '%')->orWhere('ALU_PATERNO','like',  Session::get('participa_search') . '%')
->orderBy(Session::get('participa_field'), Session::get('participa_sort'))
        ->paginate(500);

                        $asitealumno = participa::alumno();

$participaTALLER = participa::TALLER();

                        $TALLER = TALLER::all();
                                                $alumno = alumno::all();


$participa = participa::all();




 return view('participa3.list',compact('participaalumnolist','participaalumno','participaTALLER','TALLER','alumno','participa'));


    }



   public function getList2create()
    {
               Session::put('participaalumnocreate_search', Input::has('ok') ? Input::get('search') : (Session::has('participaalumnocreate_search') ? Session::get('participaalumnocreate_search') : ''));
        Session::put('participaalumnocreate_field', Input::has('field') ? Input::get('field') : (Session::has('participaalumnocreate_field') ? Session::get('participaalumnocreate_field') : 'id'));
        Session::put('participaalumnocreate_sort', Input::has('sort') ? Input::get('sort') : (Session::has('participaalumnocreate_sort') ? Session::get('participaalumnocreate_sort') : 'asc'));
        $participaalumnolist = alumno::where('id', 'like', Session::get('participaalumnocreate_search') . '%')->orWhere('ALU_PATERNO','like',  Session::get('participaalumnocreate_search') . '%')
->orderBy(Session::get('participaalumnocreate_field'), Session::get('participaalumnocreate_sort'))
        ->paginate(500);
                        

        $participaalumno = participa::alumno();
         $participaTALLER = participa::TALLER();
         $participa = participa::all();
        $alumno=alumno::all();
        $TALLER = TALLER::all();


return view('participa3.list2create',compact('participaalumnolist','participaalumno','participaTALLER','participa','alumno','TALLER'));


    }



    public function getList3create($id)
    {
          Session::put('participaTALLERcreate_search', Input::has('ok') ? Input::get('search') : (Session::has('participaTALLERcreate_search') ? Session::get('participaTALLERcreate_search') : ''));
        Session::put('participaTALLERcreate_field', Input::has('field') ? Input::get('field') : (Session::has('participaTALLERcreate_field') ? Session::get('participaTALLERcreate_field') : 'TAL_NOMBRE'));
        Session::put('participaTALLERcreate_sort', Input::has('sort') ? Input::get('sort') : (Session::has('participaTALLERcreate_sort') ? Session::get('participaTALLERcreate_sort') : 'asc'));
        $participaTALLERlist = TALLER::where('TAL_NOMBRE', 'like', '%' . Session::get('participaTALLERcreate_search') . '%')
                                            ->orWhere('TAL_ANO','like',  Session::get('participaTALLERcreate__search') . '%')

            ->orderBy(Session::get('participaTALLERcreate_field'), Session::get('participaTALLERcreate_sort'))->paginate(20);





                return view('participa3.list3create',compact('participaTALLERlist','id'));

    }


     public function getCreate($id,$TALLER_id)
    {

            //$TALLER = TALLER::lists('TAL_NOMBRE', 'id');
                     //   $alumno = alumno::lists('id', 'id');

$taller=taller::where('id', '=', $TALLER_id)
                ->first();
          $alumno = alumno::where('id', '=', $id)
                ->first();

        return view('participa3.create',compact('taller','alumno','TALLER_id','id'));
    }

      public function postCreate($id,$TALLER_id)
    {
                $participa= DB::table('PARTICIPA')->where('id',$id)->where('TALLER_id',$TALLER_id)->delete();

        $validator = Validator::make(Input::all(), [
            'id' => 'required|cl_rut','id' => 'required']);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
        $participa = new participa();
   $participa->id = Input::get('id');
                                                $participa->TALLER_id = Input::get('TALLER_id');


        $participa->save();
        return ['url' => 'participa3/list'];
    }






   

    public function getList2update($id,$TALLER_id,$idviejo,$TALLER_idviejo)
    {
         Session::put('participaalumnoupdate_search', Input::has('ok') ? Input::get('search') : (Session::has('participaalumnoupdate_search') ? Session::get('participaalumnoupdate_search') : ''));
        Session::put('participaalumnoupdate_field', Input::has('field') ? Input::get('field') : (Session::has('participaalumnoupdate_field') ? Session::get('participaalumnoupdate_field') : 'id'));
        Session::put('participaalumnoupdate_sort', Input::has('sort') ? Input::get('sort') : (Session::has('participaalumnoupdate_sort') ? Session::get('participaalumnoupdate_sort') : 'asc'));
        $participaalumnolist = alumno::where('id', 'like', Session::get('participaalumnoupdate_search') . '%')->orWhere('ALU_PATERNO','like',  Session::get('participaalumnoupdate_search') . '%')
->orderBy(Session::get('participaalumnoupdate_field'), Session::get('participaalumnoupdate_sort'))
        ->paginate(500);
                      



                return view('participa3.list2update',compact('participaalumnolist','id','TALLER_id','idviejo','TALLER_idviejo'));


    }




    public function getList3update($id,$TALLER_id,$idviejo,$TALLER_idviejo)
    {
       Session::put('participaTALLERupdate_search', Input::has('ok') ? Input::get('search') : (Session::has('participaTALLERupdate_search') ? Session::get('participaTALLERupdate_search') : ''));
        Session::put('participaTALLERupdate_field', Input::has('field') ? Input::get('field') : (Session::has('participaTALLERupdate_field') ? Session::get('participaTALLERupdate_field') : 'TAL_NOMBRE'));
        Session::put('participaTALLERupdate_sort', Input::has('sort') ? Input::get('sort') : (Session::has('participaTALLERupdate_sort') ? Session::get('participaTALLERupdate_sort') : 'asc'));
        $participaTALLERlist = TALLER::where('TAL_NOMBRE', 'like', '%' . Session::get('participaTALLERupdate_search') . '%')
                                                    ->orWhere('TAL_ANO','like',  Session::get('participaTALLERupdate__search') . '%')

            ->orderBy(Session::get('participaTALLERupdate_field'), Session::get('participaTALLERupdate_sort'))->paginate(20);





                return view('participa3.list3update',compact('participaTALLERlist','id','TALLER_id','idviejo','TALLER_idviejo'));

    }



 public function getUpdate3($id,$TALLER_id,$idviejo,$TALLER_idviejo)
    {

         //   $TALLER = TALLER::lists('TAL_NOMBRE', 'id');
           //             $alumno = alumno::lists('id', 'id');


         $taller=taller::where('id', '=', $TALLER_id)
                ->first();
          $alumno = alumno::where('id', '=', $id)
                ->first();

                         $participa=participa::all();

    
        return view('participa3.update3',compact('participa','taller','alumno','id','TALLER_id','idviejo','TALLER_idviejo'));
    }

    public function postUpdate3($id,$TALLER_id,$idviejo,$TALLER_idviejo)
    {
            $participaviejo= DB::table('PARTICIPA')->where('id',$idviejo)->where('TALLER_id',$TALLER_idviejo)->delete();
            $participa= DB::table('PARTICIPA')->where('id',$id)->where('TALLER_id',$TALLER_id)->delete();

         $validator = Validator::make(Input::all(), [
            'id' => 'required|cl_rut','id' => 'required']);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
        $participa = new participa();
   $participa->id = Input::get('id');
                                                $participa->TALLER_id = Input::get('TALLER_id');


        $participa->save();
        return ['url' => 'participa3/list'];
    }




    public function getDelete($id,$TALLER_id)
    {


 
    DB::table('PARTICIPA')->where('id',$id)->where('TALLER_id',$TALLER_id)->delete();
        return Redirect('participa3/list');
    }



public function getShow2($id,$TALLER_id)
    {
$alumno= alumno::paginate();
                         $TALLER=TALLER::all();
                                                  $alumno=alumno::all();

                         $participa=participa::all();



        return view('participa3.show2',compact('alumno','id','TALLER_id','TALLER','alumno','participa','alumno'));    }



        public function getShowalumnocreate($id)
    {
$alumno= alumno::paginate();
                    $UNIVERSIDAD = alumno::UNIVERSIDAD();

        return view('participa3.showalumnocreate',compact('alumno','id','UNIVERSIDAD'));    }


        public function getShowtallercreate($id,$con_id)
    {
$TALLER= TALLER::paginate();

        return view('participa3.showTALLERcreate',compact('TALLER','id','con_id'));    }


                  public function getShowalumnoupdate($id,$TALLER_id,$idviejo,$TALLER_idviejo)
    {
$alumno= alumno::paginate();
                    $UNIVERSIDAD = alumno::UNIVERSIDAD();

        return view('participa3.showalumnoupdate',compact('alumno','id','UNIVERSIDAD','TALLER_id','idviejo','TALLER_idviejo'));    }


        public function getShowtallerupdate($id,$TALLER_id,$idviejo,$TALLER_idviejo)
    {
$TALLER= TALLER::paginate();

        return view('participa3.showTALLERupdate',compact('TALLER','id','TALLER_id','idviejo','TALLER_idviejo'));    }


} 
