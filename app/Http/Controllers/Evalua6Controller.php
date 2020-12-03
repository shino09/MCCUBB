<?php
namespace Magister\Http\Controllers;

use Magister\Evalua;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Magister\Tesis;
use Magister\Tribunal;
use Magister\Conforman;

use Magister\Alumno;
use Magister\Profesor;
use Magister\Dirige;
use Magister\Codirige;


use Magister\Nucleo;



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



use Magister\Congreso;
use Magister\Departamento;




class Evalua6Controller extends Controller
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
        return view('evalua6.index');
    }

    public function getList()
    {
         Session::put('evalua6_search', Input::has('ok') ? Input::get('search') : (Session::has('evalua6_search') ? Session::get('evalua6_search') : ''));
        Session::put('evalua6_field', Input::has('field') ? Input::get('field') : (Session::has('evalua6_field') ? Session::get('evalua6_field') : 'id'));
        Session::put('evalua6_sort', Input::has('sort') ? Input::get('sort') : (Session::has('evalua6_sort') ? Session::get('evalua6_sort') : 'asc'));
                         //$evaluaalumno= evalua::alumno();
        $evaluaalumno = alumno::where('id', 'like', Session::get('evalua6_search') . '%')->orWhere('ALU_PATERNO','like',  Session::get('evalua6_search') . '%')
->orderBy(Session::get('evalua6_field'), Session::get('evalua6_sort'))
        ->paginate(500);

                      

        $alumnotodos=alumno::all();

                         $evaluatesis= evalua::tesis();


                 $evaluatodos = evalua::all();

                 $tesis = tesis::all();

 $TRIBUNAL = evalua::TRIBUNAL();


         $conforman=conforman::all();
                                $profesor=profesor::all();


                            //$CONGRESO = Departamento::lists('name', 'id');



                return view('evalua6.list',compact('evaluatesis','tesis','evaluaalumno','evalua','evaluatodos','alumnotodos','TRIBUNAL','profesor','conforman'));


    }

     public function getUpdate($id,$TRIBUNAL_id)
    {
        //return view('evalua6.update', ['evalua6' => evalua6::find($id)]);
        $evalua6 = evalua::where('id', '=', $id)
                ->where('TRIBUNAL_id', '=', $TRIBUNAL_id)
                ->first();

            $TESIS = TESIS::lists('TES_NOMBRE', 'id');
                        $TRIBUNAL = TRIBUNAL::lists('id', 'id');

$tesis=tesis::where('id', '=', $id)
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

 $dirige = dirige::where('id', '=', $id)
                ->first();
                $profesordirigeid=$dirige->NUCLEO_id;

                 $ALUMNO_id=$tesis->ALUMNO_id;
                $alumno=alumno::where('id', '=', $ALUMNO_id)
                ->first();
                 $profesordirige = profesor::where('id', '=', $profesordirigeid)
                ->first();


                $concodirige=0;

                $codirige = codirige::where('id', '=', $id)
                ->first();



                if($codirige!= NULL){

                $profesorcodirigeid=$codirige->PROFESOR_id;
                 $profesorcodirige = profesor::where('id', '=', $profesorcodirigeid)
                ->first();
                $concodirige=1;

                return view('evalua6.update',compact('evalua6','alumno','concodirige','profesorcodirige','profesordirige','profesor1','profesor2','profesor3','tesis','TESIS','TRIBUNAL'));
              }
                
        
    
        return view('evalua6.update',compact('evalua6','alumno','concodirige','profesordirige','profesor1','profesor2','profesor3','tesis','TESIS','TRIBUNAL'));
    }

    public function postUpdate($id,$TRIBUNAL_id)
    {

           $evalua6= DB::table('EVALUA')->where('id',$id)->where('TRIBUNAL_id',$TRIBUNAL_id)->delete();

         $validator = Validator::make(Input::all(), [
            'TRIBUNAL_id' => 'required','id' => 'required',
            'EVA_NOTADIRIGEINFORME' => 'required','EVA_NOTADIRIGEINFORME' => 'required','EVA_NOTAPROFESOR1INFORME' => 'required','EVA_NOTAPROFESOR2INFORME' => 'required','EVA_NOTAPROFESOR3INFORME' => 'required','EVA_NOTADIRIGEEXPOSICION' => 'required','EVA_NOTAPROFESOR1EXPOSICION' => 'required','EVA_NOTAPROFESOR2EXPOSICION' => 'required','EVA_NOTAPROFESOR3EXPOSICION' => 'required']);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
        $evalua6 = new evalua();
   $evalua6->id = Input::get('id');
                                                $evalua6->TRIBUNAL_id = Input::get('TRIBUNAL_id');

   $evalua6->EVA_NOTADIRIGEINFORME = Input::get('EVA_NOTADIRIGEINFORME');
   $evalua6->EVA_NOTAPROFESOR1INFORME = Input::get('EVA_NOTAPROFESOR1INFORME');
   $evalua6->EVA_NOTAPROFESOR2INFORME = Input::get('EVA_NOTAPROFESOR2INFORME');
   $evalua6->EVA_NOTAPROFESOR3INFORME = Input::get('EVA_NOTAPROFESOR3INFORME');
   $evalua6->EVA_NOTADIRIGEEXPOSICION = Input::get('EVA_NOTADIRIGEEXPOSICION');
   $evalua6->EVA_NOTAPROFESOR1EXPOSICION = Input::get('EVA_NOTAPROFESOR1EXPOSICION');
   $evalua6->EVA_NOTAPROFESOR2EXPOSICION = Input::get('EVA_NOTAPROFESOR2EXPOSICION');
   $evalua6->EVA_NOTAPROFESOR3EXPOSICION = Input::get('EVA_NOTAPROFESOR3EXPOSICION');
 
 $EVA_NOTADIRIGEINFORME = Input::get('EVA_NOTADIRIGEINFORME');
   $EVA_NOTAPROFESOR1INFORME = Input::get('EVA_NOTAPROFESOR1INFORME');
   $EVA_NOTAPROFESOR2INFORME = Input::get('EVA_NOTAPROFESOR2INFORME');
   $EVA_NOTAPROFESOR3INFORME = Input::get('EVA_NOTAPROFESOR3INFORME');
   $EVA_NOTADIRIGEEXPOSICION = Input::get('EVA_NOTADIRIGEEXPOSICION');
   $EVA_NOTAPROFESOR1EXPOSICION = Input::get('EVA_NOTAPROFESOR1EXPOSICION');
   $EVA_NOTAPROFESOR2EXPOSICION = Input::get('EVA_NOTAPROFESOR2EXPOSICION');
   $EVA_NOTAPROFESOR3EXPOSICION = Input::get('EVA_NOTAPROFESOR3EXPOSICION');


   

 $evalua6->EVA_NOTAFINALINFORME = number_format((($EVA_NOTADIRIGEINFORME *0.5) + ($EVA_NOTAPROFESOR1INFORME *0.125) + ($EVA_NOTAPROFESOR2INFORME * 0.125) + ($EVA_NOTAPROFESOR3INFORME * 0.25)),1);
   $evalua6->EVA_NOTAFINALEXPOSICION = number_format((($EVA_NOTADIRIGEEXPOSICION*0.25)+($EVA_NOTAPROFESOR1EXPOSICION*0.20)+
          ($EVA_NOTAPROFESOR2EXPOSICION *0.20)+($EVA_NOTAPROFESOR3EXPOSICION*0.35)),1);
   $evalua6->EVA_NOTAFINAL = number_format((($evalua6->EVA_NOTAFINALINFORME*0.6) +($evalua6->EVA_NOTAFINALEXPOSICION)*0.4),1);
        $evalua6->save();







$NOTAFINAL=$evalua6->EVA_NOTAFINAL;

          $tesis= DB::table('TESIS')
            ->where('id', $id)
            ->update(['TES_NOTA' => $NOTAFINAL]);



if ($NOTAFINAL > 4) {
    $tesisestado=DB::table('TESIS')
            ->where('id', $id)
            ->update(['TES_ESTADO' => '4']);

}

else{
     $tesisestado=DB::table('TESIS')
            ->where('id', $id)
            ->update(['TES_ESTADO' => '3']);

}


        $fechafinal = Carbon::now();

 $tesisfecha= DB::table('TESIS')
            ->where('id', $id)
            ->update(['TES_FECHAFINAL' => $fechafinal]);


        return ['url' => 'evalua6/list'];
    }

    





    public function getCreate()
    {
        //return view('evalua6.create');

            $TESIS = TESIS::lists('TES_NOMBRE', 'id');
                        $TRIBUNAL = TRIBUNAL::lists('id', 'id');



        return view('evalua6.create',compact('TESIS','TRIBUNAL'));
    }

    public function postCreate()
    {
        $validator = Validator::make(Input::all(), [
            'TRIBUNAL_id' => 'required','id' => 'required']);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
        $evalua6 = new evalua();
   $evalua6->id = Input::get('id');

                                                $evalua6->TRIBUNAL_id = Input::get('TRIBUNAL_id');
   $evalua6->EVA_NOTAGUIA = Input::get('EVA_NOTAGUIA');

   $evalua6->EVA_NOTAINFORMANTE = Input::get('EVA_NOTAINFORMANTE');
   $evalua6->EVA_NOTASALA = Input::get('EVA_NOTASALA');
   $evalua6->EVA_NOTAFINAL = Input::get('EVA_NOTAFINAL');


        $evalua6->save();
        return ['url' => 'evalua6/list'];
    }

    /*public function getDelete($id,$TRIBUNAL_id)
    {


 
    DB::table('EVALUA')->where('id',$id)->where('TRIBUNAL_id',$TRIBUNAL_id)->delete();
        return Redirect('evalua6/list');
    }*/

      public function getDelete($id,$TRIBUNAL_id)
    {

         $tesis= DB::table('TESIS')
            ->where('id', $id)
            ->update(['TES_NOTA' => '0']);



    $tesisestado=DB::table('TESIS')
            ->where('id', $id)
            ->update(['TES_ESTADO' => '0']);

             $tesisfecha= DB::table('TESIS')
            ->where('id', $id)
            ->update(['TES_FECHAFINAL' => '0000-00-00']);


 
    DB::table('EVALUA')->where('id',$id)->where('TRIBUNAL_id',$TRIBUNAL_id)->delete();
        return Redirect('evalua6/list');
    }

   


         public function getShow3($idtesis,$TRIBUNAL_id)
    {
//id es el rut del alumno tribuna_id es id de la tesis
        
 $tesis=tesis::where('id', '=', $idtesis)
                ->first();
 $tribunal=tribunal::where('id', '=', $TRIBUNAL_id)
                ->first();

                $ALUMNO_id= $tesis->ALUMNO_id;
                $alumno=alumno::where('id', '=', $ALUMNO_id)
                ->first();
$evalua=evalua::where('id', '=', $idtesis)->
where('TRIBUNAL_id', '=', $TRIBUNAL_id)
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

                return view('evalua6.show3',compact('tribunal','alumno','concodirige','profesorcodirige','profesordirige','profesor1','profesor2','profesor3','tesis','evalua'));
}
   return view('evalua6.show3',compact('tribunal','alumno','concodirige','profesordirige','profesor1','profesor2','profesor3','tesis','evalua'));
} 

} 
