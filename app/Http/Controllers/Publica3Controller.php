<?php
namespace Magister\Http\Controllers;

use Magister\Publica;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Magister\Tesis;
use Magister\Profesor;
use Magister\Alumno;

use Magister\Revista;
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



class Publica3Controller extends Controller
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
        return view('publica3.index');
    }

    public function getList()
    {
         Session::put('publica_search', Input::has('ok') ? Input::get('search') : (Session::has('publica_search') ? Session::get('publica_search') : ''));
        Session::put('publica_field', Input::has('field') ? Input::get('field') : (Session::has('publica_field') ? Session::get('publica_field') : 'id'));
        Session::put('publica_sort', Input::has('sort') ? Input::get('sort') : (Session::has('publica_sort') ? Session::get('publica_sort') : 'asc'));
        $publicaalumnolist = alumno::where('id', 'like', Session::get('publica_search') . '%')->orWhere('ALU_PATERNO','like',  Session::get('publica_search') . '%')
->orderBy(Session::get('publica_field'), Session::get('publica_sort'))
        ->paginate(500);

                        $asitealumno = publica::alumno();

$publicaREVISTA = publica::REVISTA();

                        $REVISTA = REVISTA::all();
                                                $alumno = alumno::all();


$publica = publica::all();




 return view('publica3.list',compact('publicaalumnolist','publicaalumno','publicaREVISTA','REVISTA','alumno','publica'));


    }



   public function getList2create()
    {
               Session::put('publicaalumnocreate_search', Input::has('ok') ? Input::get('search') : (Session::has('publicaalumnocreate_search') ? Session::get('publicaalumnocreate_search') : ''));
        Session::put('publicaalumnocreate_field', Input::has('field') ? Input::get('field') : (Session::has('publicaalumnocreate_field') ? Session::get('publicaalumnocreate_field') : 'id'));
        Session::put('publicaalumnocreate_sort', Input::has('sort') ? Input::get('sort') : (Session::has('publicaalumnocreate_sort') ? Session::get('publicaalumnocreate_sort') : 'asc'));
        $publicaalumnolist = alumno::where('id', 'like', Session::get('publicaalumnocreate_search') . '%')->orWhere('ALU_PATERNO','like',  Session::get('publicaalumnocreate_search') . '%')
->orderBy(Session::get('publicaalumnocreate_field'), Session::get('publicaalumnocreate_sort'))
        ->paginate(500);
                        

        $publicaalumno = publica::alumno();
         $publicaREVISTA = publica::REVISTA();
         $publica = publica::all();
        $alumno=alumno::all();
        $REVISTA = REVISTA::all();


return view('publica3.list2create',compact('publicaalumnolist','publicaalumno','publicaREVISTA','publica','alumno','REVISTA'));


    }



    public function getList3create($id)
    {
          Session::put('publicaREVISTAcreate_search', Input::has('ok') ? Input::get('search') : (Session::has('publicaREVISTAcreate_search') ? Session::get('publicaREVISTAcreate_search') : ''));
        Session::put('publicaREVISTAcreate_field', Input::has('field') ? Input::get('field') : (Session::has('publicaREVISTAcreate_field') ? Session::get('publicaREVISTAcreate_field') : 'REV_NOMBRE'));
        Session::put('publicaREVISTAcreate_sort', Input::has('sort') ? Input::get('sort') : (Session::has('publicaREVISTAcreate_sort') ? Session::get('publicaREVISTAcreate_sort') : 'asc'));
        $publicaREVISTAlist = REVISTA::where('REV_NOMBRE', 'like', '%' . Session::get('publicaREVISTAcreate_search') . '%')
        ->orWhere('REV_ANO','like',  Session::get('publicaREVISTAcreate__search') . '%')

            ->orderBy(Session::get('publicaREVISTAcreate_field'), Session::get('publicaREVISTAcreate_sort'))->paginate(20);





                return view('publica3.list3create',compact('publicaREVISTAlist','id'));

    }


     public function getCreate($id,$REVISTA_id)
    {

           // $REVISTA = REVISTA::lists('REV_NOMBRE', 'id');
             //           $alumno = alumno::lists('id', 'id');

$revista=revista::where('id', '=', $REVISTA_id)
                ->first();
          $alumno = alumno::where('id', '=', $id)
                ->first();

        return view('publica3.create',compact('revista','alumno','REVISTA_id','id'));
    }

      public function postCreate($id,$REVISTA_id)
    {
                $publica= DB::table('PUBLICA')->where('id',$id)->where('REVISTA_id',$REVISTA_id)->delete();

        $validator = Validator::make(Input::all(), [
            'id' => 'required|cl_rut','id' => 'required']);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
        $publica = new publica();
   $publica->id = Input::get('id');
                                                $publica->REVISTA_id = Input::get('REVISTA_id');


        $publica->save();
        return ['url' => 'publica3/list'];
    }






   

    public function getList2update($id,$REVISTA_id,$idviejo,$REVISTA_idviejo)
    {
         Session::put('publicaalumnoupdate_search', Input::has('ok') ? Input::get('search') : (Session::has('publicaalumnoupdate_search') ? Session::get('publicaalumnoupdate_search') : ''));
        Session::put('publicaalumnoupdate_field', Input::has('field') ? Input::get('field') : (Session::has('publicaalumnoupdate_field') ? Session::get('publicaalumnoupdate_field') : 'id'));
        Session::put('publicaalumnoupdate_sort', Input::has('sort') ? Input::get('sort') : (Session::has('publicaalumnoupdate_sort') ? Session::get('publicaalumnoupdate_sort') : 'asc'));
        $publicaalumnolist = alumno::where('id', 'like', Session::get('publicaalumnoupdate_search') . '%')->orWhere('ALU_PATERNO','like',  Session::get('publicaalumnoupdate_search') . '%')
->orderBy(Session::get('publicaalumnoupdate_field'), Session::get('publicaalumnoupdate_sort'))
        ->paginate(500);
                      



                return view('publica3.list2update',compact('publicaalumnolist','id','REVISTA_id','idviejo','REVISTA_idviejo'));


    }




    public function getList3update($id,$REVISTA_id,$idviejo,$REVISTA_idviejo)
    {
       Session::put('publicaREVISTAupdate_search', Input::has('ok') ? Input::get('search') : (Session::has('publicaREVISTAupdate_search') ? Session::get('publicaREVISTAupdate_search') : ''));
        Session::put('publicaREVISTAupdate_field', Input::has('field') ? Input::get('field') : (Session::has('publicaREVISTAupdate_field') ? Session::get('publicaREVISTAupdate_field') : 'REV_NOMBRE'));
        Session::put('publicaREVISTAupdate_sort', Input::has('sort') ? Input::get('sort') : (Session::has('publicaREVISTAupdate_sort') ? Session::get('publicaREVISTAupdate_sort') : 'asc'));
        $publicaREVISTAlist = REVISTA::where('REV_NOMBRE', 'like', '%' . Session::get('publicaREVISTAupdate_search') . '%')
                ->orWhere('REV_ANO','like',  Session::get('publicaREVISTAupdate__search') . '%')

            ->orderBy(Session::get('publicaREVISTAupdate_field'), Session::get('publicaREVISTAupdate_sort'))->paginate(20);





                return view('publica3.list3update',compact('publicaREVISTAlist','id','REVISTA_id','idviejo','REVISTA_idviejo'));

    }



 public function getUpdate3($id,$REVISTA_id,$idviejo,$REVISTA_idviejo)
    {

   $revista=revista::where('id', '=', $REVISTA_id)
                ->first();
          $alumno = alumno::where('id', '=', $id)
                ->first();
         

                         $publica=publica::all();

    
        return view('publica3.update3',compact('publica','revista','alumno','id','REVISTA_id','idviejo','REVISTA_idviejo'));
    }

    public function postUpdate3($id,$REVISTA_id,$idviejo,$REVISTA_idviejo)
    {
            $publicaviejo= DB::table('PUBLICA')->where('id',$idviejo)->where('REVISTA_id',$REVISTA_idviejo)->delete();
            $publica= DB::table('PUBLICA')->where('id',$id)->where('REVISTA_id',$REVISTA_id)->delete();

         $validator = Validator::make(Input::all(), [
            'id' => 'required|cl_rut','id' => 'required']);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
        $publica = new publica();
   $publica->id = Input::get('id');
                                                $publica->REVISTA_id = Input::get('REVISTA_id');


        $publica->save();
        return ['url' => 'publica3/list'];
    }




    public function getDelete($id,$REVISTA_id)
    {


 
    DB::table('PUBLICA')->where('id',$id)->where('REVISTA_id',$REVISTA_id)->delete();
        return Redirect('publica3/list');
    }



public function getShow2($id,$REVISTA_id)
    {
$alumno= alumno::paginate();
                         $REVISTA=REVISTA::all();
                                                  $alumno=alumno::all();

                         $publica=publica::all();



        return view('publica3.show2',compact('alumno','id','REVISTA_id','REVISTA','alumno','publica','alumno'));    }



        public function getShowalumnocreate($id)
    {
$alumno= alumno::paginate();
                    $UNIVERSIDAD = alumno::UNIVERSIDAD();

        return view('publica3.showalumnocreate',compact('alumno','id','UNIVERSIDAD'));    }


        public function getShowrevistacreate($id,$con_id)
    {
$REVISTA= REVISTA::paginate();

        return view('publica3.showREVISTAcreate',compact('REVISTA','id','con_id'));    }


                  public function getShowalumnoupdate($id,$REVISTA_id,$idviejo,$REVISTA_idviejo)
    {
$alumno= alumno::paginate();
                    $UNIVERSIDAD = alumno::UNIVERSIDAD();

        return view('publica3.showalumnoupdate',compact('alumno','id','UNIVERSIDAD','REVISTA_id','idviejo','REVISTA_idviejo'));    }


        public function getShowrevistaupdate($id,$REVISTA_id,$idviejo,$REVISTA_idviejo)
    {
$REVISTA= REVISTA::paginate();

        return view('publica3.showREVISTAupdate',compact('REVISTA','id','REVISTA_id','idviejo','REVISTA_idviejo'));    }


} 
