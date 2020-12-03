<?php
namespace Magister\Http\Controllers;

use Magister\Orienta;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Magister\Profesor;
use Magister\Alumno;
use Magister\Departamento;
use Magister\Colaborador;

use Magister\Visitante;

use Magister\Nucleo;
use Magister\Director;






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



class Orienta4Controller extends Controller
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
        return view('orienta4.index');
    }

    public function getList()
    {
          Session::put('orienta_search', Input::has('ok') ? Input::get('search') : (Session::has('orienta_search') ? Session::get('orienta_search') : ''));
        Session::put('orienta_field', Input::has('field') ? Input::get('field') : (Session::has('orienta_field') ? Session::get('orienta_field') : 'id'));
        Session::put('orienta_sort', Input::has('sort') ? Input::get('sort') : (Session::has('orienta_sort') ? Session::get('orienta_sort') : 'asc'));
                        $profesor = orienta::PROFESOR();
        $orientas = profesor::where('id', 'like', Session::get('orienta_search') . '%')->orWhere('PRO_PATERNO','like',  Session::get('orienta_search') . '%')
->orderBy(Session::get('orienta_field'), Session::get('orienta_sort'))
        ->paginate(500);

                        $orientas2 = orienta::all();

 $ALUMNO = orienta::ALUMNO();

        $PROFESOR=PROFESOR::all();
                $alumno=alumno::all();

                            //$profesor = Departamento::lists('name', 'id');

                return view('orienta4.list',compact('orientas','profesor','orientas2','ALUMNO','PROFESOR','alumno'));
               







                            //$ALUMNO = Departamento::lists('name', 'ALUMNO_id');



        //return view('dirige.list', ['diriges' => $diriges]);
    }

     public function getUpdate($ALUMNO_id,$id)
    {
        //return view('dirige.update', ['dirige' => dirige::find($ALUMNO_id)]);

            $ALUMNO = ALUMNO::lists('TES_NOMBRE', 'ALUMNO_id');
                        $PROFESOR = PROFESOR::lists('ALUMNO_id', 'ALUMNO_id');


         $dirige = orienta::where('ALUMNO_id', '=', $ALUMNO_id)
                ->where('id', '=', $id)
                ->first();


    
        return view('orienta4.update',compact('dirige','ALUMNO','PROFESOR','ALUMNO_id','id'));
    }

    public function postUpdate($ALUMNO_id,$id)
    {
            $dirige= DB::table('ORIENTA')->where('ALUMNO_id',$ALUMNO_id)->where('id',$id)->delete();

         $Validator = Validator::make(Input::all(), [
            'id' => 'required|cl_rut','ALUMNO_id' => 'required']);
        if ($Validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $Validator->getMessageBag()->toArray()
            );
        }
        $dirige = new orienta();
   $dirige->ALUMNO_id = Input::get('ALUMNO_id');
                                                $dirige->id = Input::get('id');


        $dirige->save();
        return ['url' => 'orienta4/list'];
    }




  public function getUpdate2($id,$ALUMNO_id)
    {
        //return view('dirige.update', ['dirige' => dirige::find($ALUMNO_id)]);

            $ALUMNO = ALUMNO::lists('id', 'id');
                        $PROFESOR = PROFESOR::lists('id', 'id');


         $dirige = orienta::where('ALUMNO_id', '=', $ALUMNO_id)
                ->where('id', '=', $id)
                ->first();

                        // $dirige=dirige::all();

    
        return view('orienta4.update2',compact('dirige','ALUMNO','PROFESOR','ALUMNO_id','id'));
    }

    public function postUpdate2($id,$ALUMNO_id)
    {
            $dirige= DB::table('ORIENTA')->where('ALUMNO_id',$ALUMNO_id)->where('id',$id)->delete();

         $Validator = Validator::make(Input::all(), [
            'id' => 'required|cl_rut','ALUMNO_id' => 'required']);
        if ($Validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $Validator->getMessageBag()->toArray()
            );
        }
        $dirige = new orienta();
   $dirige->ALUMNO_id = Input::get('ALUMNO_id');
                                                $dirige->id = Input::get('id');


        $dirige->save();
        return ['url' => 'orienta4/list'];
    }


 public function getUpdate3($id,$ALUMNO_id,$idviejo,$ALUMNO_idviejo)
    {
        //return view('dirige.update', ['dirige' => dirige::find($ALUMNO_id)]);

            $profesor=profesor::where('id', '=', $id)
                ->first();
          $alumno = alumno::where('id', '=', $ALUMNO_id)
                ->first();
         

                         $dirige=orienta::all();

    
        return view('orienta4.update3',compact('dirige','alumno','profesor','ALUMNO_id','id','ALUMNO_idviejo','idviejo'));
    }

    public function postUpdate3($id,$ALUMNO_id,$idviejo,$ALUMNO_idviejo)
    {
            $dirigeviejo= DB::table('ORIENTA')->where('id',$idviejo)->where('ALUMNO_id',$ALUMNO_idviejo)->delete();
                        $dirige= DB::table('ORIENTA')->where('id',$id)->where('ALUMNO_id',$ALUMNO_id)->delete();


         $Validator = Validator::make(Input::all(), [
            'id' => 'required|cl_rut','ALUMNO_id' => 'required']);
        if ($Validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $Validator->getMessageBag()->toArray()
            );
        }
        $dirige = new orienta();
                                                $dirige->id = Input::get('id');
                                                   $dirige->ALUMNO_id = Input::get('ALUMNO_id');



        $dirige->save();
        return ['url' => 'orienta4/list'];
    }




      public function getIndex2update($id,$ALUMNO_id)
    {
        return view('orienta4.index2update','id','ALUMNO_id');
    }

    public function getList2update($id,$ALUMNO_id,$idviejo,$ALUMNO_idviejo)
    {
        Session::put('orientaprofesorupdate_search', Input::has('ok') ? Input::get('search') : (Session::has('orientaprofesorupdate_search') ? Session::get('orientaprofesorupdate_search') : ''));
        Session::put('orientaprofesorupdate_field', Input::has('field') ? Input::get('field') : (Session::has('orientaporientaupdate_field') ? Session::get('orientaprofesorupdate_field') : 'PRO_PATERNO'));
        Session::put('orientaprofesorupdate_sort', Input::has('sort') ? Input::get('sort') : (Session::has('orientaprofesorupdate_sort') ? Session::get('orientaprofesorupdate_sort') : 'asc'));
        $PROFESOR = profesor::where('id', 'like', Session::get('orientaprofesorupdate_search') . '%')->orWhere('PRO_PATERNO','like',  Session::get('orientaprofesorupdate_search') . '%')->orderBy(Session::get('orientaprofesorupdate_field'), Session::get('orientaprofesorupdate_sort'))->paginate(500);



                            //$DEPARTAMENTO = Departamento::lists('PRO_NOMBRES', 'ALUMNO_id');

               // return view('profesor.list',compact('PROFESOR'));

                    $DEPARTAMENTO = profesor::DEPARTAMENTO();


                            //$DEPARTAMENTO = Departamento::lists('PRO_NOMBRES', 'ALUMNO_id');

                return view('orienta4.list2update',compact('PROFESOR','DEPARTAMENTO','id','ALUMNO_id','idviejo','ALUMNO_idviejo'));


        //return view('profesor.list', ['PROFESOR' => $PROFESOR]);
    }



   public function getIndex3update($id,$ALUMNO_id)
    {
        //return view('orienta4.index3');
                                $ALUMNO_id=$ALUMNO_id;

                        return view('orienta4.index3update',compact('ALUMNO_id','id'));

    }

    public function getList3update($id,$ALUMNO_id,$idviejo,$ALUMNO_idviejo)
    {
              Session::put('orientaalumnoupdate_search', Input::has('ok') ? Input::get('search') : (Session::has('orientaalumnoupdate_search') ? Session::get('aorientalumno_updatesearch') : ''));
        Session::put('orientaalumnoupdate_field', Input::has('field') ? Input::get('field') : (Session::has('orientaalumnoupdate_field') ? Session::get('orientaalumnoupdate_field') : 'ALU_NOMBRES'));
        Session::put('orientaalumnoupdate_sort', Input::has('sort') ? Input::get('sort') : (Session::has('orientaalumnoupdate_sort') ? Session::get('orientaalumnoupdate_sort') : 'asc'));
        $alumnos = alumno::where('id', 'like', Session::get('orientaalumnoupdate_search') . '%')

                 ->orWhere('ALU_PATERNO','like',  Session::get('orientaalumnoupdate_search') . '%')

            ->orderBy(Session::get('orientaalumnoupdate_field'), Session::get('orientaalumnoupdate_sort'))->paginate(500);

                
                $universidads = alumno::universidad();


                            //$universidads = universidad::lists('ALU_NOMBRES', 'id');

                                return view('orienta4.list3update',compact('alumnos','id','ALUMNO_id','universidads','idviejo','ALUMNO_idviejo'));

                            //$DEPARTAMENTO = Departamento::lists('PRO_NOMBRES', 'ALUMNO_id');

               // return view('orienta4.list3update',compact('ALUMNOs','alumno','ALUMNO_id','ALUMNO_id','id'));

        //return view('ALUMNO.list', ['ALUMNOs' => $ALUMNOs]);
    }








      public function getIndex2create()
    {
        return view('orienta4.index2create');
    }

    public function getList2create()
    {
        Session::put('orientaprofesorcreate_search', Input::has('ok') ? Input::get('search') : (Session::has('orientaprofesorcreate_search') ? Session::get('orientaprofesorcreate_search') : ''));
        Session::put('orientaprofesorcreate_field', Input::has('field') ? Input::get('field') : (Session::has('orientaprofesorcreate_field') ? Session::get('orientaprofesorcreate_field') : 'PRO_PATERNO'));
        Session::put('orientaprofesorcreate_sort', Input::has('sort') ? Input::get('sort') : (Session::has('orientaprofesorcreate_sort') ? Session::get('orientaprofesorcreate_sort') : 'asc'));
        $PROFESOR = profesor::where('id', 'like', Session::get('orientaprofesorcreate_search') . '%')->orWhere('PRO_PATERNO','like',  Session::get('orientaprofesorcreate_search') . '%')->orderBy(Session::get('orientaprofesorcreate_field'), Session::get('orientaprofesorcreate_sort'))->paginate(500);                        //$DEPARTAMENTO = Departamento::lists('PRO_NOMBRES', 'ALUMNO_id');

               // return view('profesor.list',compact('PROFESOR'));

                    $DEPARTAMENTO = profesor::DEPARTAMENTO();


                            //$DEPARTAMENTO = Departamento::lists('PRO_NOMBRES', 'ALUMNO_id');

                return view('orienta4.list2create',compact('PROFESOR','DEPARTAMENTO'));


        //return view('profesor.list', ['PROFESOR' => $PROFESOR]);
    }



   public function getIndex3create($pro_id)
    {
        //return view('orienta4.index3');
                                $ALUMNO_id=$ALUMNO_id;

                        return view('orienta4.index3create',compact('ALUMNO_id','pro_id'));

    }

    public function getList3create($pro_id)
    {
        Session::put('orientaalumnocreate_search', Input::has('ok') ? Input::get('search') : (Session::has('orientaalumnocreate_search') ? Session::get('orientaalumnocreate_search') : ''));
        Session::put('ALUMNO_field', Input::has('field') ? Input::get('field') : (Session::has('Aorientaalumnocreatefield') ? Session::get('orientaalumnocreate_field') : 'ALU_PATERNO'));
        Session::put('orientaalumnocreate_sort', Input::has('sort') ? Input::get('sort') : (Session::has('orientaalumnocreate_sort') ? Session::get('orientaalumnocreate_sort') : 'asc'));
        $ALUMNOs = ALUMNO::where('ALU_PATERNO', 'like', '%' . Session::get('orientaalumnocreate_search') . '%')
            ->orderBy(Session::get('orientaalumnocreate_field'), Session::get('orientaalumnocreate_sort'))->paginate(500);

        $alumno=Alumno::all();


                            //$DEPARTAMENTO = Departamento::lists('PRO_NOMBRES', 'ALUMNO_id');

                return view('orienta4.list3create',compact('ALUMNOs','alumno','pro_id'));

        //return view('ALUMNO.list', ['ALUMNOs' => $ALUMNOs]);
    }
    public function getCreate($id,$ALUMNO_id)
    {
        //return view('dirige.create');

          //  $ALUMNO = ALUMNO::lists('id', 'id');
                      //  $PROFESOR = PROFESOR::lists('id', 'id');

$profesor=profesor::where('id', '=', $id)
                ->first();
          $alumno = alumno::where('id', '=', $ALUMNO_id)
                ->first();

        return view('orienta4.create',compact('alumno','profesor','id','ALUMNO_id'));
    }

    public function postCreate($id,$ALUMNO_id)
    {

                                $dirige= DB::table('ORIENTA')->where('id',$id)->where('ALUMNO_id',$ALUMNO_id)->delete();

        $Validator = Validator::make(Input::all(), [
            'id' => 'required|cl_rut','ALUMNO_id' => 'required']);
        if ($Validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $Validator->getMessageBag()->toArray()
            );
        }
        $dirige = new orienta();
   $dirige->ALUMNO_id = Input::get('ALUMNO_id');
                                                $dirige->id = Input::get('id');


        $dirige->save();
        return ['url' => 'orienta4/list'];
    }



public function getCreate2($ALUMNO_id)
    {
        //return view('dirige.create');

         
                return view('orienta4.create2', ['profesor' => profesor::find($ALUMNO_id)],compact('ALUMNO','PROFESOR'));

        //return view('orienta4.create2',compact('ALUMNO','PROFESOR'));
    }

    public function postCreate2($ALUMNO_id)
    {
        $Validator = Validator::make(Input::all(), [
            'id' => 'required|cl_rut','ALUMNO_id' => 'required']);
        if ($Validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $Validator->getMessageBag()->toArray()
            );
        }
        $dirige = new orienta();
   $dirige->ALUMNO_id = Input::get('ALUMNO_id');
                                                $dirige->id = Input::get('id');


        $dirige->save();
        return ['url' => 'orienta4/list'];
    }
    public function getDelete($id,$ALUMNO_id)
    {


 
    DB::table('ORIENTA')->where('ALUMNO_id',$ALUMNO_id)->where('id',$id)->delete();
        return Redirect('orienta4/list');
    }

   public function getShow($ALUMNO_id,$id)
    {

        $dirige = orienta::where('ALUMNO_id', '=', $ALUMNO_id)
                ->where('id', '=', $id)
                ->first();

        return view('orienta4.show', ['dirige' => $dirige]);
    }


public function getShow2($id,$ALUMNO_id)
    {
$profesor= profesor::paginate();
                    $DEPARTAMENTO = profesor::DEPARTAMENTO();
                         $ALUMNO=ALUMNO::all();
                                                  $PROFESOR=PROFESOR::all();

                         $dirige=orienta::all();
                                                  $alumno=alumno::all();



        return view('orienta4.show2',compact('profesor','ALUMNO_id','id','DEPARTAMENTO','ALUMNO','PROFESOR','dirige','alumno'));    }



        public function getShowprofesorcreate($id)
    {
$profesor= profesor::paginate();
                    $DEPARTAMENTO = profesor::DEPARTAMENTO();

        return view('orienta4.showprofesorcreate',compact('profesor','id','DEPARTAMENTO'));    }


        public function getShowalumnocreate($id,$ALUMNO_id)
    {
$ALUMNO= ALUMNO::paginate();
$alumno = ALUMNO::all();

                $universidads = alumno::universidad();


        return view('orienta4.showalumnocreate',compact('ALUMNO','id','universidads','ALUMNO_id','alumno'));    }


                  public function getShowprofesorupdate($id,$ALUMNO_id,$idviejo,$ALUMNO_idviejo)
    {
$profesor= profesor::paginate();
                    $DEPARTAMENTO = profesor::DEPARTAMENTO();

        return view('orienta4.showprofesorupdate',compact('profesor','id','DEPARTAMENTO','ALUMNO_id','idviejo','ALUMNO_idviejo'));    }


        public function getShowalumnoupdate($id,$ALUMNO_id,$idviejo,$ALUMNO_idviejo)
    {
$ALUMNO= ALUMNO::paginate();
$alumno = ALUMNO::all();
                $universidads = alumno::universidad();


        return view('orienta4.showalumnoupdate',compact('ALUMNO','id','ALUMNO_id','alumno','universidads','idviejo','ALUMNO_idviejo'));    }




public function getShowprofesorcreate2($id)
    {
$profesor= profesor::paginate();
                    $DEPARTAMENTO = profesor::DEPARTAMENTO();
                     $director=Director::all();    

        $nucleo=Nucleo::all();    

        $visitante=Visitante::all();    

        $colaborador=Colaborador::all();  

        return view('orienta4.showprofesorcreate2',compact('profesor','id','alumnoid','DEPARTAMENTO','director','nucleo','visitante','colaborador'));    }

        public function getShowprofesorupdate2($id,$ALUMNO_id,$idviejo,$ALUMNO_idviejo)
    {
$profesor= profesor::paginate();
                    $DEPARTAMENTO = profesor::DEPARTAMENTO();
                     $director=Director::all();    

        $nucleo=Nucleo::all();    

        $visitante=Visitante::all();    

        $colaborador=Colaborador::all();  

        return view('orienta4.showprofesorupdate2',compact('profesor','id','alumnoid','DEPARTAMENTO','director','nucleo','visitante','colaborador','ALUMNO_id','idviejo','ALUMNO_idviejo'));    }

} 
