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



class Orienta6Controller extends Controller
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
        return view('orienta6.index');
    }

    public function getList()
    {
           Session::put('orienta6_search', Input::has('ok') ? Input::get('search') : (Session::has('orienta6_search') ? Session::get('orienta6_search') : ''));
        Session::put('orienta6_field', Input::has('field') ? Input::get('field') : (Session::has('orienta6_field') ? Session::get('orienta6_field') : 'ALU_PATERNO'));
        Session::put('orienta6_sort', Input::has('sort') ? Input::get('sort') : (Session::has('orienta6_sort') ? Session::get('orienta6_sort') : 'asc'));
        $orienta6s = alumno::where('id', 'like', Session::get('orienta6_search') . '%')

                 ->orWhere('ALU_PATERNO','like',  Session::get('orienta6_search') . '%')

            ->orderBy(Session::get('orienta6_field'), Session::get('orienta6_sort'))->paginate(500);

                
                $universidads = alumno::universidad();
                         $orienta=orienta::all();

                         $profesor=profesor::all();


                            //$universidads = universidad::lists('ALU_NOMBRES', 'id');

                                return view('orienta6.list',compact('orienta6s','universidads','profesor','orienta'));





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


    
        return view('orienta6.update',compact('dirige','ALUMNO','PROFESOR','ALUMNO_id','id'));
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
        return ['url' => 'orienta6/list'];
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

    
        return view('orienta6.update2',compact('dirige','ALUMNO','PROFESOR','ALUMNO_id','id'));
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
        return ['url' => 'orienta6/list'];
    }


 public function getUpdate3($id,$ALUMNO_id,$idviejo,$ALUMNO_idviejo)
    {
        //return view('dirige.update', ['dirige' => dirige::find($ALUMNO_id)]);

    

                               //  $PROFESOR = PROFESOR::lists('id', 'id');

$profesor=profesor::where('id', '=', $id)
                ->first();
          $alumno = alumno::where('id', '=', $ALUMNO_id)
                ->first();

                         $dirige=orienta::all();

    
        return view('orienta6.update3',compact('dirige','alumno','profesor','ALUMNO_id','id','ALUMNO_idviejo','idviejo'));
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
        return ['url' => 'orienta6/list'];
    }




      public function getIndex3update($id,$ALUMNO_id)
    {
        return view('orienta6.index2update','id','ALUMNO_id');
    }

    public function getList3update($id,$ALUMNO_id,$idviejo,$ALUMNO_idviejo)
    {
        Session::put('orientaprofesorupdate_search', Input::has('ok') ? Input::get('search') : (Session::has('orientaprofesorupdate_search') ? Session::get('orientaprofesorupdate_search') : ''));
        Session::put('orientaprofesorupdate_field', Input::has('field') ? Input::get('field') : (Session::has('orientaporientaupdate_field') ? Session::get('orientaprofesorupdate_field') : 'PRO_PATERNO'));
        Session::put('orientaprofesorupdate_sort', Input::has('sort') ? Input::get('sort') : (Session::has('orientaprofesorupdate_sort') ? Session::get('orientaprofesorupdate_sort') : 'asc'));
        $PROFESOR = profesor::where('id', 'like', Session::get('orientaprofesorupdate_search') . '%')->orWhere('PRO_PATERNO','like',  Session::get('orientaprofesorupdate_search') . '%')->orderBy(Session::get('orientaprofesorupdate_field'), Session::get('orientaprofesorupdate_sort'))->paginate(500);



                            //$DEPARTAMENTO = Departamento::lists('PRO_NOMBRES', 'ALUMNO_id');

               // return view('profesor.list',compact('PROFESOR'));

                    $DEPARTAMENTO = profesor::DEPARTAMENTO();


                            //$DEPARTAMENTO = Departamento::lists('PRO_NOMBRES', 'ALUMNO_id');

                return view('orienta6.list3update',compact('PROFESOR','DEPARTAMENTO','id','ALUMNO_id','idviejo','ALUMNO_idviejo'));


        //return view('profesor.list', ['PROFESOR' => $PROFESOR]);
    }



   public function getIndex2update($id,$ALUMNO_id)
    {
        //return view('orienta6.index3');
                                $ALUMNO_id=$ALUMNO_id;

                        return view('orienta6.index2update',compact('ALUMNO_id','id'));

    }

    public function getList2update($id,$ALUMNO_id,$idviejo,$ALUMNO_idviejo)
    {
              Session::put('orientaalumnoupdate_search', Input::has('ok') ? Input::get('search') : (Session::has('orientaalumnoupdate_search') ? Session::get('aorientalumno_updatesearch') : ''));
        Session::put('orientaalumnoupdate_field', Input::has('field') ? Input::get('field') : (Session::has('orientaalumnoupdate_field') ? Session::get('orientaalumnoupdate_field') : 'ALU_NOMBRES'));
        Session::put('orientaalumnoupdate_sort', Input::has('sort') ? Input::get('sort') : (Session::has('orientaalumnoupdate_sort') ? Session::get('orientaalumnoupdate_sort') : 'asc'));
        $alumnos = alumno::where('id', 'like', Session::get('orientaalumnoupdate_search') . '%')

                 ->orWhere('ALU_PATERNO','like',  Session::get('orientaalumnoupdate_search') . '%')

            ->orderBy(Session::get('orientaalumnoupdate_field'), Session::get('orientaalumnoupdate_sort'))->paginate(500);

                
                $universidads = alumno::universidad();


                            //$universidads = universidad::lists('ALU_NOMBRES', 'id');

                                return view('orienta6.list2update',compact('alumnos','id','ALUMNO_id','universidads','idviejo','ALUMNO_idviejo'));

                            //$DEPARTAMENTO = Departamento::lists('PRO_NOMBRES', 'ALUMNO_id');

               // return view('orienta6.list3update',compact('ALUMNOs','alumno','ALUMNO_id','ALUMNO_id','id'));

        //return view('ALUMNO.list', ['ALUMNOs' => $ALUMNOs]);
    }








      public function getIndex3create()
    {
        return view('orienta6.index3create');
    }

    public function getList3create($ALUMNO_id)
    {
        Session::put('orientaprofesorcreate_search', Input::has('ok') ? Input::get('search') : (Session::has('orientaprofesorcreate_search') ? Session::get('orientaprofesorcreate_search') : ''));
        Session::put('orientaprofesorcreate_field', Input::has('field') ? Input::get('field') : (Session::has('orientaprofesorcreate_field') ? Session::get('orientaprofesorcreate_field') : 'PRO_PATERNO'));
        Session::put('orientaprofesorcreate_sort', Input::has('sort') ? Input::get('sort') : (Session::has('orientaprofesorcreate_sort') ? Session::get('orientaprofesorcreate_sort') : 'asc'));
        $PROFESOR = profesor::where('id', 'like', Session::get('orientaprofesorcreate_search') . '%')->orWhere('PRO_PATERNO','like',  Session::get('orientaprofesorcreate_search') . '%')->orderBy(Session::get('orientaprofesorcreate_field'), Session::get('orientaprofesorcreate_sort'))->paginate(500);                        //$DEPARTAMENTO = Departamento::lists('PRO_NOMBRES', 'ALUMNO_id');

               // return view('profesor.list',compact('PROFESOR'));

                    $DEPARTAMENTO = profesor::DEPARTAMENTO();


                            //$DEPARTAMENTO = Departamento::lists('PRO_NOMBRES', 'ALUMNO_id');

                return view('orienta6.list3create',compact('PROFESOR','DEPARTAMENTO','ALUMNO_id'));

        //return view('profesor.list', ['PROFESOR' => $PROFESOR]);
    }



   public function getIndex2create()
    {
        //return view('orienta6.index3');
                                $ALUMNO_id=$ALUMNO_id;

                        return view('orienta6.index2create',compact('ALUMNO_id'));

    }

    public function getList2create()
    {
        
               Session::put('orientaalumnocreate_search', Input::has('ok') ? Input::get('search') : (Session::has('orientaalumnocreate_search') ? Session::get('orientaalumnocreate_search') : ''));
        Session::put('orientaalumnocreate_field', Input::has('field') ? Input::get('field') : (Session::has('orientaalumnocreate_field') ? Session::get('orientaalumnocreate_field') : 'id'));
        Session::put('orientaalumnocreate_sort', Input::has('sort') ? Input::get('sort') : (Session::has('orientaalumnocreate_sort') ? Session::get('orientaalumnocreate_sort') : 'asc'));
          $ALUMNOs = alumno::where('id', 'like', Session::get('orientaalumnocreate_search') . '%')->orWhere('ALU_PATERNO','like',  Session::get('orientaalumnocreate_search') . '%')
->orderBy(Session::get('orientaalumnocreate_field'), Session::get('orientaalumnocreate_sort'))
        ->paginate(500);

        $alumno=Alumno::all();


                            //$DEPARTAMENTO = Departamento::lists('PRO_NOMBRES', 'ALUMNO_id');

                return view('orienta6.list2create',compact('ALUMNOs','alumno'));

        //return view('ALUMNO.list', ['ALUMNOs' => $ALUMNOs]);
    }
    public function getCreate($ALUMNO_id,$id)
    {
        //return view('dirige.create');

            //$ALUMNO = ALUMNO::lists('id', 'id');
                      //  $PROFESOR = PROFESOR::lists('id', 'id');

$profesor=profesor::where('id', '=', $id)
                ->first();
          $alumno = alumno::where('id', '=', $ALUMNO_id)
                ->first();

        return view('orienta6.create',compact('alumno','profesor','id','ALUMNO_id'));
    }

    public function postCreate($ALUMNO_id,$id)
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
        return ['url' => 'orienta6/list'];
    }



public function getCreate2($ALUMNO_id)
    {
        //return view('dirige.create');

         
                return view('orienta6.create2', ['profesor' => profesor::find($ALUMNO_id)],compact('ALUMNO','PROFESOR'));

        //return view('orienta6.create2',compact('ALUMNO','PROFESOR'));
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
        return ['url' => 'orienta6/list'];
    }
    public function getDelete($ALUMNO_id,$id)
    {


 
    DB::table('ORIENTA')->where('ALUMNO_id',$ALUMNO_id)->where('id',$id)->delete();
        return Redirect('orienta6/list');
    }

   public function getShow($ALUMNO_id,$id)
    {

        $dirige = orienta::where('ALUMNO_id', '=', $ALUMNO_id)
                ->where('id', '=', $id)
                ->first();

        return view('orienta6.show', ['dirige' => $dirige]);
    }


public function getShow2($id,$ALUMNO_id)
    {
$profesor= profesor::paginate();
                    $DEPARTAMENTO = profesor::DEPARTAMENTO();
                         $ALUMNO=ALUMNO::all();
                                                  $PROFESOR=PROFESOR::all();

                         $dirige=orienta::all();
                                                  $alumno=alumno::all();



        return view('orienta6.show2',compact('profesor','ALUMNO_id','id','DEPARTAMENTO','ALUMNO','PROFESOR','dirige','alumno'));    }



        public function getShowprofesorcreate($ALUMNO_id,$id)
    {
$profesor= profesor::paginate();
                    $DEPARTAMENTO = profesor::DEPARTAMENTO();

        return view('orienta6.showprofesorcreate',compact('profesor','id','DEPARTAMENTO','ALUMNO_id'));    }


        public function getShowalumnocreate($ALUMNO_id)
    {
$ALUMNO= ALUMNO::paginate();
$alumno = ALUMNO::all();

                $universidads = alumno::universidad();


        return view('orienta6.showalumnocreate',compact('ALUMNO','ALUMNO_id','universidads','alumno'));    }


                  public function getShowprofesorupdate($id,$ALUMNO_id,$idviejo,$ALUMNO_idviejo)
    {
$profesor= profesor::paginate();
                    $DEPARTAMENTO = profesor::DEPARTAMENTO();

        return view('orienta6.showprofesorupdate',compact('profesor','id','DEPARTAMENTO','ALUMNO_id','idviejo','ALUMNO_idviejo'));    }


        public function getShowalumnoupdate($id,$ALUMNO_id,$idviejo,$ALUMNO_idviejo)
    {
$ALUMNO= ALUMNO::paginate();
$alumno = ALUMNO::all();
                $universidads = alumno::universidad();


        return view('orienta6.showalumnoupdate',compact('ALUMNO','id','ALUMNO_id','alumno','universidads','idviejo','ALUMNO_idviejo'));    }


} 
