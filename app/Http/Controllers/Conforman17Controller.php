<?php
namespace Magister\Http\Controllers;



use Magister\Conforman;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Magister\Profesor;
use Magister\Alumno;

use Magister\Tribunal;
use Magister\Departamento;
use Magister\Tesis;


use Magister\Evalua;


use Magister\Nucleo;
use Magister\Dirige;
use Magister\Codirige;

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



class Conforman17Controller extends Controller
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
        return view('conforman17.index');
    }

    public function getList()
    {
          Session::put('conforman17_search', Input::has('ok') ? Input::get('search') : (Session::has('conforman17_search') ? Session::get('conforman17_search') : ''));
        Session::put('conforman17_field', Input::has('field') ? Input::get('field') : (Session::has('conforman17_field') ? Session::get('conforman17_field') : 'ALU_PATERNO'));
        Session::put('conforman17_sort', Input::has('sort') ? Input::get('sort') : (Session::has('conforman17_sort') ? Session::get('conforman17_sort') : 'asc'));
        $conformans = alumno::where('id', 'like', Session::get('conforman17_search') . '%')->orWhere('ALU_PATERNO','like',  Session::get('conforman17_search') . '%')
->orderBy(Session::get('conforman17_field'), Session::get('conforman17_sort'))
        ->paginate(500);

                        $conformans2 = conforman::all();
                        $profesor = conforman::PROFESOR();

 $TRIBUNAL = conforman::TRIBUNAL();

        $PROFESOR=PROFESOR::all();
                $ALUMNO=ALUMNO::all();
                                $TESIS=TESIS::all();
                                                                $EVALUA=EVALUA::all();



                $TRIBUNAL=TRIBUNAL::all();

                            //$profesor = Departamento::lists('name', 'id');

                return view('conforman17.list',compact('EVALUA','TESIS','ALUMNO','conformans','profesor','conformans2','TRIBUNAL','PROFESOR','TRIBUNAL'));
               



    }

     public function getUpdate($TRIBUNAL_id,$id)
    {

            $TRIBUNAL = TRIBUNAL::lists('TES_NOMBRE', 'TRIBUNAL_id');
                        $PROFESOR = PROFESOR::lists('TRIBUNAL_id', 'TRIBUNAL_id');


         $dirige = conforman::where('TRIBUNAL_id', '=', $TRIBUNAL_id)
                ->where('id', '=', $id)
                ->first();


    
        return view('conforman17.update',compact('dirige','TRIBUNAL','PROFESOR','TRIBUNAL_id','id'));
    }

    public function postUpdate($TRIBUNAL_id,$id)
    {
            $dirige= DB::table('CONFORMAN')->where('TRIBUNAL_id',$TRIBUNAL_id)->where('id',$id)->delete();

         $Validator = Validator::make(Input::all(), [
            'id' => 'required|cl_rut','TRIBUNAL_id' => 'required']);
        if ($Validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $Validator->getMessageBag()->toArray()
            );
        }
        $dirige = new conforman();
   $dirige->TRIBUNAL_id = Input::get('TRIBUNAL_id');
                                                $dirige->id = Input::get('id');


        $dirige->save();
        return ['url' => 'conforman17/list'];
    }





 public function getUpdate2($idnuevo,$TRIBUNAL_id,$id1viejo,$id2viejo,$id3viejo)
    {
        //return view('dirige.update', ['dirige' => dirige::find($TRIBUNAL_id)]);

            $TRIBUNAL = TRIBUNAL::lists('id', 'id');
                        $PROFESOR = PROFESOR::lists('id', 'id');


         

                         $dirige=conforman::all();

    
        return view('conforman17.update3',compact('dirige','TRIBUNAL','PROFESOR','id','TRIBUNAL_id','id1viejo','id2viejo','id3viejo'));
    }

    public function postUpdate2($id,$TRIBUNAL_id,$idviejo,$TRIBUNAL_idviejo)
    {
            $dirigeviejo= DB::table('CONFORMAN')->where('id',$idviejo)->where('TRIBUNAL_id',$TRIBUNAL_idviejo)->delete();
                        $dirige= DB::table('CONFORMAN')->where('id',$id)->where('TRIBUNAL_id',$TRIBUNAL_id)->delete();


         $Validator = Validator::make(Input::all(), [
            'id' => 'required|cl_rut','TRIBUNAL_id' => 'required']);
        if ($Validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $Validator->getMessageBag()->toArray()
            );
        }
        $dirige = new conforman();
                                                $dirige->id = Input::get('id');
                                                   $dirige->TRIBUNAL_id = Input::get('TRIBUNAL_id');



        $dirige->save();
        return ['url' => 'conforman17/list'];
    }

 


 public function getUpdate3($idnuevo,$TRIBUNAL_id,$id1viejo,$id2viejo,$id3viejo)
    {
        //return view('dirige.update', ['dirige' => dirige::find($TRIBUNAL_id)]);

            $TRIBUNAL = TRIBUNAL::lists('id', 'id');
                        $PROFESOR = PROFESOR::lists('id', 'id');


         

                         $dirige=conforman::all();

    
        return view('conforman17.update3',compact('dirige','TRIBUNAL','PROFESOR','id','TRIBUNAL_id','id1viejo','id2viejo','id3viejo'));
    }

    public function postUpdate3($id,$TRIBUNAL_id,$idviejo,$TRIBUNAL_idviejo)
    {
            $dirigeviejo= DB::table('CONFORMAN')->where('id',$idviejo)->where('TRIBUNAL_id',$TRIBUNAL_idviejo)->delete();
                        $dirige= DB::table('CONFORMAN')->where('id',$id)->where('TRIBUNAL_id',$TRIBUNAL_id)->delete();


         $Validator = Validator::make(Input::all(), [
            'id' => 'required|cl_rut','TRIBUNAL_id' => 'required']);
        if ($Validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $Validator->getMessageBag()->toArray()
            );
        }
        $dirige = new conforman();
                                                $dirige->id = Input::get('id');
                                                   $dirige->TRIBUNAL_id = Input::get('TRIBUNAL_id');



        $dirige->save();
        return ['url' => 'conforman17/list'];
    }




      public function getIndex2update($id,$id2,$id3,$idviejo,$id2viejo,$id3viejo)
    {
        return view('conforman17.index2update','id','idviejo','id2','id2viejo','id3','id3viejo');
    }

    public function getList2update($idnuevo,$TRIBUNAL_id,$id1viejo,$id2viejo,$id3viejo)
    {
        Session::put('conformanprofesorupdate_search', Input::has('ok') ? Input::get('search') : (Session::has('conformanprofesorupdate_search') ? Session::get('conformanprofesorupdate_search') : ''));
        Session::put('conformanprofesorupdate_field', Input::has('field') ? Input::get('field') : (Session::has('conformanpconformanupdate_field') ? Session::get('conformanprofesorupdate_field') : 'PRO_PATERNO'));
        Session::put('conformanprofesorupdate_sort', Input::has('sort') ? Input::get('sort') : (Session::has('conformanprofesorupdate_sort') ? Session::get('conformanprofesorupdate_sort') : 'asc'));
        $PROFESOR = profesor::where('id', 'like', Session::get('conformanprofesorupdate_search') . '%')->orWhere('PRO_PATERNO','like',  Session::get('conformanprofesorupdate_search') . '%')->orderBy(Session::get('conformanprofesorupdate_field'), Session::get('conformanprofesorupdate_sort'))->paginate(20);



                            //$DEPARTAMENTO = Departamento::lists('PRO_NOMBRES', 'TRIBUNAL_id');

               // return view('profesor.list',compact('PROFESOR'));

                    $DEPARTAMENTO = profesor::DEPARTAMENTO();


                            //$DEPARTAMENTO = Departamento::lists('PRO_NOMBRES', 'TRIBUNAL_id');

                return view('conforman17.list2update',compact('PROFESOR','DEPARTAMENTO','idnuevo','id1viejo','id2viejo','id3viejo','TRIBUNAL_id'));






        //return view('conforman17.list2update', ['PROFESOR' => $PROFESOR,'DEPARTAMENTO' => $DEPARTAMENTO,'id' => $idF,'id2' => $id2,'id3' => $id3,'idviejo' => $idviejo,'id2viejo' => $id2viejo]);
    }

 public function getList3update($id,$id2,$id3,$idviejo,$id2viejo,$id3viejo)
    {
        Session::put('conformanprofesorupdate_search', Input::has('ok') ? Input::get('search') : (Session::has('conformanprofesorupdate_search') ? Session::get('conformanprofesorupdate_search') : ''));
        Session::put('conformanprofesorupdate_field', Input::has('field') ? Input::get('field') : (Session::has('conformanpconformanupdate_field') ? Session::get('conformanprofesorupdate_field') : 'PRO_PATERNO'));
        Session::put('conformanprofesorupdate_sort', Input::has('sort') ? Input::get('sort') : (Session::has('conformanprofesorupdate_sort') ? Session::get('conformanprofesorupdate_sort') : 'asc'));
        $PROFESOR = profesor::where('id', 'like', Session::get('conformanprofesorupdate_search') . '%')->orWhere('PRO_PATERNO','like',  Session::get('conformanprofesorupdate_search') . '%')->orderBy(Session::get('conformanprofesorupdate_field'), Session::get('conformanprofesorupdate_sort'))->paginate(20);



                            //$DEPARTAMENTO = Departamento::lists('PRO_NOMBRES', 'TRIBUNAL_id');

               // return view('profesor.list',compact('PROFESOR'));

                    $DEPARTAMENTO = profesor::DEPARTAMENTO();


                            //$DEPARTAMENTO = Departamento::lists('PRO_NOMBRES', 'TRIBUNAL_id');

                return view('conforman17.list3update',compact('PROFESOR','DEPARTAMENTO','id','idviejo','id2','id2viejo','id3','id3viejo'));


        //return view('profesor.list', ['PROFESOR' => $PROFESOR]);
    }



     public function getList4update($id,$id2,$id3,$idviejo,$id2viejo,$id3viejo)
    {
        Session::put('conformanprofesorupdate_search', Input::has('ok') ? Input::get('search') : (Session::has('conformanprofesorupdate_search') ? Session::get('conformanprofesorupdate_search') : ''));
        Session::put('conformanprofesorupdate_field', Input::has('field') ? Input::get('field') : (Session::has('conformanpconformanupdate_field') ? Session::get('conformanprofesorupdate_field') : 'PRO_PATERNO'));
        Session::put('conformanprofesorupdate_sort', Input::has('sort') ? Input::get('sort') : (Session::has('conformanprofesorupdate_sort') ? Session::get('conformanprofesorupdate_sort') : 'asc'));
        $PROFESOR = profesor::where('id', 'like', Session::get('conformanprofesorupdate_search') . '%')->orWhere('PRO_PATERNO','like',  Session::get('conformanprofesorupdate_search') . '%')->orderBy(Session::get('conformanprofesorupdate_field'), Session::get('conformanprofesorupdate_sort'))->paginate(20);



                            //$DEPARTAMENTO = Departamento::lists('PRO_NOMBRES', 'TRIBUNAL_id');

               // return view('profesor.list',compact('PROFESOR'));

                    $DEPARTAMENTO = profesor::DEPARTAMENTO();


                            //$DEPARTAMENTO = Departamento::lists('PRO_NOMBRES', 'TRIBUNAL_id');

                return view('conforman17.list4update',compact('PROFESOR','DEPARTAMENTO','id','idviejo','id2','id2viejo','id3','id3viejo'));


        //return view('profesor.list', ['PROFESOR' => $PROFESOR]);
    }

 






public function getList2create()
    {
         Session::put('conforman17tesiscreate_search', Input::has('ok') ? Input::get('search') : (Session::has('conforman17tesiscreate_search') ? Session::get('conforman17tesiscreate_search') : ''));
        Session::put('conforman17tesiscreate_field', Input::has('field') ? Input::get('field') : (Session::has('conforman17tesiscreate_field') ? Session::get('conforman17tesiscreate_field') : 'ALU_PATERNO'));
        Session::put('conforman17tesiscreate_sort', Input::has('sort') ? Input::get('sort') : (Session::has('conforman17tesiscreate_sort') ? Session::get('conforman17tesiscreate_sort') : 'asc'));
        $conforman17tesiscreates = alumno::where('id', 'like', '%' . Session::get('conforman17tesiscreate_search') . '%')->orWhere('ALU_PATERNO','like',  Session::get('conforman17tesiscreate_search') . '%')->orderBy(Session::get('conforman17tesiscreate_field'), Session::get('conforman17tesiscreate_sort'))->paginate(500);



$tesis = DB::table('TESIS')
            ->leftJoin('EVALUA', 'TESIS.id', '=', 'EVALUA.id')
               ->whereNull('EVALUA.id')

           //->get();
       ->get(array('TESIS.id', 'TESIS.TES_NOMBRE','TESIS.TES_ANO','TESIS.TES_SEMESTRE','TESIS.ALUMNO_id','TESIS.TES_DESCRIPCION','TESIS.TES_NOTA','TESIS.TES_FECHAINICIO','TESIS.TES_FECHAFINAL','TESIS.TES_ESTADO'));
 // $tesis = tesis::leftJoin('EVALUA', function($join) {
      //$join->on('TESIS.id', '=', 'EVALUA.id');
    //})
    //->whereNull('EVALUA.id')
   // ->get();

//$tesis = tesis::all();

$evalua = evalua::all();

$tesis2=dirige::tesis();

$alumno = Tesis::alumno();


                            //$DEPARTAMENTO = Departamento::lists('PRO_NOMBRES', 'id');

                return view('conforman17.list2create',compact('conforman17tesiscreates','alumno','tesis','tesis2','evalua'));
            }


       public function getList3create($id)
    {
      Session::put('conformanprofesorcreate2_search', Input::has('ok') ? Input::get('search') : (Session::has('conformanprofesorcreate2_search') ? Session::get('conformanprofesorcreate2_search') : ''));
        Session::put('conformanprofesorcreate2_field', Input::has('field') ? Input::get('field') : (Session::has('conformanprofesorcreate2_field') ? Session::get('conformanprofesorcreate2_field') : 'PRO_PATERNO'));
        Session::put('conformanprofesorcreate2_sort', Input::has('sort') ? Input::get('sort') : (Session::has('conformanprofesorcreate2_sort') ? Session::get('conformanprofesorcreate2_sort') : 'asc'));
        $PROFESOR = profesor::where('id', 'like', Session::get('conformanprofesorcreate2_search') . '%')->orWhere('PRO_PATERNO','like',  Session::get('conformanprofesorcreate2_search') . '%')->orderBy(Session::get('conformanprofesorcreate2_field'), Session::get('conformanprofesorcreate2_sort'))->paginate(500);                        //$DEPARTAMENTO = Departamento::lists('PRO_NOMBRES', 'TRIBUNAL_id');

               // return view('profesor.list',compact('PROFESOR'));

                    $DEPARTAMENTO = profesor::DEPARTAMENTO();
                  $profesor2 = DB::table('PROFESOR')
            ->leftJoin('VISITANTE', 'PROFESOR.id', '=', 'VISITANTE.id')
               ->whereNull('VISITANTE.id')

      ->get(array('PROFESOR.id','PROFESOR.PRO_NOMBRES','PROFESOR.PRO_MATERNO','PROFESOR.PRO_PATERNO','PROFESOR.PRO_EMAIL','PROFESOR.PRO_TITULO','PROFESOR.PRO_GRADO','PROFESOR.PRO_TELEFONO','PROFESOR.DEPARTAMENTO_id'));

                            //$DEPARTAMENTO = Departamento::lists('PRO_NOMBRES', 'TRIBUNAL_id');

                return view('conforman17.list3create',compact('profesor2','PROFESOR','DEPARTAMENTO','id'));


        //return view('profesor.list', ['PROFESOR' => $PROFESOR]);
    }


       public function getList4create($id,$idguia)
    {
        Session::put('conformanprofesorcreate3_search', Input::has('ok') ? Input::get('search') : (Session::has('conformanprofesorcreate3_search') ? Session::get('conformanprofesorcreate3_search') : ''));
        Session::put('conformanprofesorcreate3_field', Input::has('field') ? Input::get('field') : (Session::has('conformanprofesorcreate3_field') ? Session::get('conformanprofesorcreate3_field') : 'PRO_PATERNO'));
        Session::put('conformanprofesorcreate3_sort', Input::has('sort') ? Input::get('sort') : (Session::has('conformanprofesorcreate3_sort') ? Session::get('conformanprofesorcreate3_sort') : 'asc'));
        $PROFESOR = profesor::where('id', 'like', Session::get('conformanprofesorcreate3_search') . '%')->orWhere('PRO_PATERNO','like',  Session::get('conformanprofesorcreate3_search') . '%')->orderBy(Session::get('conformanprofesorcreate3_field'), Session::get('conformanprofesorcreate3_sort'))->paginate(500);                        //$DEPARTAMENTO = Departamento::lists('PRO_NOMBRES', 'TRIBUNAL_id');

               // return view('profesor.list',compact('PROFESOR'));

                    $DEPARTAMENTO = profesor::DEPARTAMENTO();
  
               $profesor2 = DB::table('PROFESOR')
            ->leftJoin('VISITANTE', 'PROFESOR.id', '=', 'VISITANTE.id')
               ->whereNull('VISITANTE.id')

      ->get(array('PROFESOR.id','PROFESOR.PRO_NOMBRES','PROFESOR.PRO_MATERNO','PROFESOR.PRO_PATERNO','PROFESOR.PRO_EMAIL','PROFESOR.PRO_TITULO','PROFESOR.PRO_GRADO','PROFESOR.PRO_TELEFONO','PROFESOR.DEPARTAMENTO_id'));

                            //$DEPARTAMENTO = Departamento::lists('PRO_NOMBRES', 'TRIBUNAL_id');

                return view('conforman17.list4create',compact('profesor2','PROFESOR','DEPARTAMENTO','id','idguia'));


        //return view('profesor.list', ['PROFESOR' => $PROFESOR]);
    }



          public function getList5create($id,$idguia,$idinformante)
    {
        Session::put('conformanprofesorcreate4_search', Input::has('ok') ? Input::get('search') : (Session::has('conformanprofesorcreate4_search') ? Session::get('conformanprofesorcreate4_search') : ''));
        Session::put('conformanprofesorcreate4_field', Input::has('field') ? Input::get('field') : (Session::has('conformanprofesorcreate4_field') ? Session::get('conformanprofesorcreate4_field') : 'PRO_PATERNO'));
        Session::put('conformanprofesorcreate4_sort', Input::has('sort') ? Input::get('sort') : (Session::has('conformanprofesorcreate4_sort') ? Session::get('conformanprofesorcreate4_sort') : 'asc'));
        $PROFESOR = profesor::where('id', 'like', Session::get('conformanprofesorcreate4_search') . '%')->orWhere('PRO_PATERNO','like',  Session::get('conformanprofesorcreate4_search') . '%')->orderBy(Session::get('conformanprofesorcreate4_field'), Session::get('conformanprofesorcreate4_sort'))->paginate(500);                        //$DEPARTAMENTO = Departamento::lists('PRO_NOMBRES', 'TRIBUNAL_id');

               // return view('profesor.list',compact('PROFESOR'));

                    $DEPARTAMENTO = profesor::DEPARTAMENTO();
        $visitante = visitante::all();


      

                return view('conforman17.list5create',compact('visitante','PROFESOR','DEPARTAMENTO','id','idguia','idinformante'));


        //return view('profesor.list', ['PROFESOR' => $PROFESOR]);
    }


    public function getCreate($id,$idguia,$idinformante,$idsala)
    {
        //return view('dirige.create');

            $TRIBUNAL = TRIBUNAL::lists('id', 'id');
                        $PROFESOR = PROFESOR::lists('id', 'id');
                       

$tesis=tesis::where('id', '=', $id)
                ->first();
          $profesor1 = profesor::where('id', '=', $idguia)
                ->first();
                $profesor2 = profesor::where('id', '=', $idinformante)
                ->first();
                $profesor3 = profesor::where('id', '=', $idsala)
                ->first();
                $dirige = dirige::where('id', '=', $id)
                ->first();
                $profesordirigeid=$dirige->NUCLEO_id;
                 $profesordirige = profesor::where('id', '=', $profesordirigeid)
                ->first();
                 $ALUMNO_id=$tesis->ALUMNO_id;
                $alumno=alumno::where('id', '=', $ALUMNO_id)
                ->first();


                      $concodirige=0;

                $codirige = codirige::where('id', '=', $id)
                ->first();



                if($codirige!= NULL){

                $profesorcodirigeid=$codirige->PROFESOR_id;
                 $profesorcodirige = profesor::where('id', '=', $profesorcodirigeid)
                ->first();
                $concodirige=1;

                 return view('conforman17.create',compact('alumno','concodirige','profesorcodirige','profesordirige','profesor1','profesor2','profesor3','tesis','TRIBUNAL','PROFESOR','id','idinformante','idguia','idsala'));
              }
                

        return view('conforman17.create',compact('alumno','profesordirige','concodirige','profesor1','profesor2','profesor3','tesis','TRIBUNAL','PROFESOR','id','idinformante','idguia','idsala'));
    }

    public function postCreate($id,$idguia,$idinformante,$idsala)
    {

                                

        $Validator = Validator::make(Input::all(), ['id' => 'required|unique:EVALUA',
            'idinformante' => 'required|cl_rut','idsala' => 'required|cl_rut']);
        if ($Validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $Validator->getMessageBag()->toArray()
            );
        }
        $fecha = Carbon::now();
  



$TRIBUNAL = new TRIBUNAL;  
  $TRIBUNAL->TRI_FECHACREACION = $fecha;

  $TRIBUNAL->save();
  $TRIBUNAL_id= $TRIBUNAL->id;





        $dirige1= DB::table('CONFORMAN')->where('id',$idguia)->where('TRIBUNAL_id',$TRIBUNAL_id)->delete();
        $dirige1 = new conforman();
       $dirige1->id = $idguia;
        $dirige1->TRIBUNAL_id = $TRIBUNAL_id;
                        $dirige1->CON_tipoprofesor='1';

        $dirige1->save();



        $dirige1= DB::table('CONFORMAN')->where('id',$idinformante)->where('TRIBUNAL_id',$TRIBUNAL_id)->delete();
        $dirige2 = new conforman();
        $dirige2->id = Input::get('idinformante');
        $dirige2->TRIBUNAL_id = $TRIBUNAL_id;
                $dirige2->CON_tipoprofesor='2';

        $dirige2->save();


        $dirige1= DB::table('CONFORMAN')->where('id',$idsala)->where('TRIBUNAL_id',$TRIBUNAL_id)->delete();
        $dirige3 = new conforman();
        $dirige3->id = Input::get('idsala');
        $dirige3->TRIBUNAL_id = $TRIBUNAL_id;
                $dirige3->CON_tipoprofesor='3';

        $dirige3->save();

 $evalua= DB::table('EVALUA')->where('id',$id)->where('TRIBUNAL_id',$TRIBUNAL_id)->delete();
        $evalua = new evalua();
        $evalua->id = Input::get('id');
        $evalua->TRIBUNAL_id = $TRIBUNAL_id;

        $evalua->save();

        return ['url' => 'conforman17/list'];
    }



public function getCreate2($TRIBUNAL_id)
    {
        //return view('dirige.create');

         
                return view('conforman17.create2', ['profesor' => profesor::find($TRIBUNAL_id)],compact('TRIBUNAL','PROFESOR'));

        //return view('conforman17.create2',compact('TRIBUNAL','PROFESOR'));
    }

    public function postCreate2($TRIBUNAL_id)
    {
        $Validator = Validator::make(Input::all(), [
            'id' => 'required|cl_rut','TRIBUNAL_id' => 'required']);
        if ($Validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $Validator->getMessageBag()->toArray()
            );
        }
        $dirige = new conforman();
   $dirige->TRIBUNAL_id = Input::get('TRIBUNAL_id');
                                                $dirige->id = Input::get('id');


        $dirige->save();
        return ['url' => 'conforman17/list'];
    }
    public function getDelete($id,$TRIBUNAL_id,$idtesis)
    {


     DB::table('EVALUA')->where('id',$idtesis)->where('TRIBUNAL_id',$TRIBUNAL_id)->delete();

    DB::table('CONFORMAN')->where('TRIBUNAL_id',$TRIBUNAL_id)->delete();
        return Redirect('conforman17/list');
    }

   public function getShow($TRIBUNAL_id,$id)
    {

        $dirige = conforman::where('TRIBUNAL_id', '=', $TRIBUNAL_id)
                ->where('id', '=', $id)
                ->first();

        return view('conforman17.show', ['dirige' => $dirige]);
    }







public function getShow2($id,$TRIBUNAL_id)
    {
        $conformans2 = conforman::all();
                        $profesor = conforman::PROFESOR();

 $TRIBUNAL = conforman::TRIBUNAL();

        $PROFESOR=PROFESOR::all();
                $ALUMNO=ALUMNO::all();
                                $TESIS=TESIS::all();
                                                                $EVALUA=EVALUA::all();



                $TRIBUNAL=TRIBUNAL::all();

                            //$profesor = Departamento::lists('name', 'id');

                return view('conforman17.show2',compact('id','EVALUA','TESIS','ALUMNO','profesor','conformans2','TRIBUNAL','PROFESOR','TRIBUNAL','TRIBUNAL_id'));  }

                        public function getShowprofesorguiacreate($id,$idguia)
    {
$profesor= profesor::paginate();
                    $DEPARTAMENTO = profesor::DEPARTAMENTO();
                                $director=Director::all();    

        $nucleo=Nucleo::all();    

        $visitante=Visitante::all();    

        $colaborador=Colaborador::all(); 

        return view('conforman17.showprofesorcreate',compact('profesor','id','idguia','DEPARTAMENTO','director','nucleo','visitante','colaborador'));    }

        public function getShowprofesorinformantecreate($id,$idguia,$idinformante)
    {
$profesor= profesor::paginate();
                    $DEPARTAMENTO = profesor::DEPARTAMENTO();
                                $director=Director::all();    

        $nucleo=Nucleo::all();    

        $visitante=Visitante::all();    

        $colaborador=Colaborador::all(); 

        return view('conforman17.showprofesorcreate2',compact('profesor','id','idguia','idinformante','DEPARTAMENTO','director','nucleo','visitante','colaborador'));    }

       public function getShowprofesorsalacreate($id,$idguia,$idinformante,$idsala)
    {
$profesor= profesor::paginate();
                    $DEPARTAMENTO = profesor::DEPARTAMENTO();
                                $director=Director::all();    

        $nucleo=Nucleo::all();    

        $visitante=Visitante::all();    

        $colaborador=Colaborador::all(); 

        return view('conforman17.showprofesorcreate3',compact('profesor','id','idguia','idinformante','idsala','DEPARTAMENTO','director','nucleo','visitante','colaborador'));    }



   public function getShowtesiscreate($id)
    {
$tesis= Tesis::paginate();
$alumno = tesis::alumno();

        return view('conforman17.showtesiscreate',compact('tesis','id','alumno'));    }




        public function getShowTRIBUNALcreate($id,$TRIBUNAL_id)
    {
$TRIBUNAL= TRIBUNAL::paginate();
$TRIBUNAL = TRIBUNAL::all();

                $universidads = TRIBUNAL::universidad();


        return view('conforman17.showTRIBUNALcreate',compact('TRIBUNAL','id','universidads','TRIBUNAL_id','TRIBUNAL'));    }


                  public function getShowprofesorupdate($id,$TRIBUNAL_id,$idviejo,$TRIBUNAL_idviejo)
    {
$profesor= profesor::paginate();
                    $DEPARTAMENTO = profesor::DEPARTAMENTO();
                                $director=Director::all();    

        $nucleo=Nucleo::all();    

        $visitante=Visitante::all();    

        $colaborador=Colaborador::all(); 

        return view('conforman17.showprofesorupdate',compact('profesor','id','DEPARTAMENTO','TRIBUNAL_id','idviejo','TRIBUNAL_idviejo','director','nucleo','visitante','colaborador'));    }


        public function getShowTRIBUNALupdate($id,$TRIBUNAL_id,$idviejo,$TRIBUNAL_idviejo)
    {
$TRIBUNAL= TRIBUNAL::paginate();
$TRIBUNAL = TRIBUNAL::all();
                $universidads = TRIBUNAL::universidad();


        return view('conforman17.showTRIBUNALupdate',compact('TRIBUNAL','id','TRIBUNAL_id','TRIBUNAL','universidads','idviejo','TRIBUNAL_idviejo'));    }




         public function getShow3($idalumno,$idtesis,$TRIBUNAL_id)
    {
//id es el rut del alumno tribuna_id es id de la tesis
        
        $tribunal=tribunal::where('id', '=', $TRIBUNAL_id)
                ->first();
 $tesis=tesis::where('id', '=', $idtesis)
                ->first();
                $alumno=alumno::where('id', '=', $idalumno)
                ->first();

               
 $conforman1 = conforman::where('TRIBUNAL_id', '=', $TRIBUNAL_id)->
 where('CON_tipoprofesor', '=', 1)
                ->first();
                $profesor1id=$conforman1->id;
                 $conforman2 = conforman::where('TRIBUNAL_id', '=', $TRIBUNAL_id)
 ->where('CON_tipoprofesor', '=', 2)
                ->first();
                $profesor2id=$conforman2->id;

                 $conforman3 = conforman::where('TRIBUNAL_id', '=', $TRIBUNAL_id)
 ->where('CON_tipoprofesor', '=', 3)
                ->first();
                $profesor3id=$conforman3->id;

          $profesor1 = profesor::where('id', '=', $profesor1id)
                ->first();
                $profesor2 = profesor::where('id', '=', $profesor2id)
                ->first();
                $profesor3 = profesor::where('id', '=', $profesor3id)
                ->first();

 $dirige = dirige::where('id', '=', $idtesis)
                ->first();
                $profesordirigeid=$dirige->NUCLEO_id;

                
                 $profesordirige = profesor::where('id', '=', $profesordirigeid)
                ->first();


                $concodirige=0;

                $codirige = codirige::where('id', '=', $idtesis)
                ->first();



                if($codirige!= NULL){

                $profesorcodirigeid=$codirige->PROFESOR_id;
                 $profesorcodirige = profesor::where('id', '=', $profesorcodirigeid)
                ->first();
                $concodirige=1;

                return view('conforman17.show3',compact('tribunal','alumno','concodirige','profesorcodirige','profesordirige','profesor1','profesor2','profesor3','tesis'));
}
   return view('conforman17.show3',compact('tribunal','alumno','concodirige','profesordirige','profesor1','profesor2','profesor3','tesis'));
} 
}
