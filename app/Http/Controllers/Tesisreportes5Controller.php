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

use Magister\Universidad;
use Magister\Asiste;
use Magister\Congreso;
use Magister\Participa;

use Magister\Taller;
use Magister\Presenta;
use Magister\Solicitud;

use Magister\Publica;
use Magister\Revista;
use Magister\Posee;
use Magister\Beneficio;
use Magister\Tiene;
use Magister\Trabajo;


use Magister\Orienta;





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



use Magister\Departamento;




class tesisreportes5Controller extends Controller
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
        return view('tesisreportes5.index');
    }

    public function getList()
    {
         Session::put('tesisreportes5_search', Input::has('ok') ? Input::get('search') : (Session::has('tesisreportes5_search') ? Session::get('tesisreportes5_search') : ''));
        Session::put('tesisreportes5_field', Input::has('field') ? Input::get('field') : (Session::has('tesisreportes5_field') ? Session::get('tesisreportes5_field') : 'id'));
        Session::put('tesisreportes5_sort', Input::has('sort') ? Input::get('sort') : (Session::has('tesisreportes5_sort') ? Session::get('tesisreportes5_sort') : 'asc'));
                         //$evaluaalumno= evalua::alumno();
        $evaluaalumno = alumno::where('id', 'like', Session::get('tesisreportes5_search') . '%')->orWhere('ALU_PATERNO','like',  Session::get('tesisreportes5_search') . '%')
->orderBy(Session::get('tesisreportes5_field'), Session::get('tesisreportes5_sort'))
        ->paginate(100);

                      

        $alumnotodos=alumno::all();

                         $evaluatesis= evalua::tesis();


                 $evaluatodos = evalua::all();

                 $tesis = tesis::all();

 $TRIBUNAL = evalua::TRIBUNAL();


         $conforman=conforman::all();
                                $profesor=profesor::all();


                            //$CONGRESO = Departamento::lists('name', 'id');



                return view('tesisreportes5.list',compact('evaluatesis','tesis','evaluaalumno','evalua','evaluatodos','alumnotodos','TRIBUNAL','profesor','conforman'));


    }

     public function getUpdate($id,$TRIBUNAL_id)
    {
        //return view('tesisreportes5.update', ['tesisreportes5' => tesisreportes5::find($id)]);
        $tesisreportes5 = evalua::where('id', '=', $id)
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

                return view('tesisreportes5.update',compact('tesisreportes5','alumno','concodirige','profesorcodirige','profesordirige','profesor1','profesor2','profesor3','tesis','TESIS','TRIBUNAL'));
              }
                
        
    
        return view('tesisreportes5.update',compact('tesisreportes5','alumno','concodirige','profesordirige','profesor1','profesor2','profesor3','tesis','TESIS','TRIBUNAL'));
    }

    public function postUpdate($id,$TRIBUNAL_id)
    {

           $tesisreportes5= DB::table('EVALUA')->where('id',$id)->where('TRIBUNAL_id',$TRIBUNAL_id)->delete();

         $validator = Validator::make(Input::all(), [
            'TRIBUNAL_id' => 'required','id' => 'required','EVA_NOTADIRIGEINFORME' => 'required','EVA_NOTADIRIGEINFORME' => 'required','EVA_NOTAPROFESOR1INFORME' => 'required','EVA_NOTAPROFESOR2INFORME' => 'required','EVA_NOTAPROFESOR3INFORME' => 'required','EVA_NOTADIRIGEEXPOSICION' => 'required','EVA_NOTAPROFESOR1EXPOSICION' => 'required','EVA_NOTAPROFESOR2EXPOSICION' => 'required','EVA_NOTAPROFESOR3EXPOSICION' => 'required']);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
        $tesisreportes5 = new evalua();
   $tesisreportes5->id = Input::get('id');
                                                $tesisreportes5->TRIBUNAL_id = Input::get('TRIBUNAL_id');
 //$tesisreportes5->EVA_NOTAGUIA = Input::get('EVA_NOTAGUIA');

   $tesisreportes5->EVA_NOTADIRIGEINFORME = Input::get('EVA_NOTADIRIGEINFORME');
   $tesisreportes5->EVA_NOTAPROFESOR1INFORME = Input::get('EVA_NOTAPROFESOR1INFORME');
   $tesisreportes5->EVA_NOTAPROFESOR2INFORME = Input::get('EVA_NOTAPROFESOR2INFORME');
   $tesisreportes5->EVA_NOTAPROFESOR3INFORME = Input::get('EVA_NOTAPROFESOR3INFORME');
   $tesisreportes5->EVA_NOTADIRIGEEXPOSICION = Input::get('EVA_NOTADIRIGEEXPOSICION');
   $tesisreportes5->EVA_NOTAPROFESOR1EXPOSICION = Input::get('EVA_NOTAPROFESOR1EXPOSICION');
   $tesisreportes5->EVA_NOTAPROFESOR2EXPOSICION = Input::get('EVA_NOTAPROFESOR2EXPOSICION');
   $tesisreportes5->EVA_NOTAPROFESOR3EXPOSICION = Input::get('EVA_NOTAPROFESOR3EXPOSICION');
 
 $EVA_NOTADIRIGEINFORME = Input::get('EVA_NOTADIRIGEINFORME');
   $EVA_NOTAPROFESOR1INFORME = Input::get('EVA_NOTAPROFESOR1INFORME');
   $EVA_NOTAPROFESOR2INFORME = Input::get('EVA_NOTAPROFESOR2INFORME');
   $EVA_NOTAPROFESOR3INFORME = Input::get('EVA_NOTAPROFESOR3INFORME');
   $EVA_NOTADIRIGEEXPOSICION = Input::get('EVA_NOTADIRIGEEXPOSICION');
   $EVA_NOTAPROFESOR1EXPOSICION = Input::get('EVA_NOTAPROFESOR1EXPOSICION');
   $EVA_NOTAPROFESOR2EXPOSICION = Input::get('EVA_NOTAPROFESOR2EXPOSICION');
   $EVA_NOTAPROFESOR3EXPOSICION = Input::get('EVA_NOTAPROFESOR3EXPOSICION');

//$tesisreportes5->EVA_NOTAFINALINFORME = (($EVA_NOTADIRIGEINFORME *0.5) + ($EVA_NOTAPROFESOR1INFORME *0.125) + ($EVA_NOTAPROFESOR2INFORME * 0.125) + ($EVA_NOTAPROFESOR3INFORME * 0.25));
//   $tesisreportes5->EVA_NOTAFINALEXPOSICION = (($EVA_NOTADIRIGEEXPOSICION*0.25)+($EVA_NOTAPROFESOR1EXPOSICION*0.20)+
  //        ($EVA_NOTAPROFESOR2EXPOSICION *0.20)+($EVA_NOTAPROFESOR3EXPOSICION*0.35));

   

 $tesisreportes5->EVA_NOTAFINALINFORME = number_format((($EVA_NOTADIRIGEINFORME *0.5) + ($EVA_NOTAPROFESOR1INFORME *0.125) + ($EVA_NOTAPROFESOR2INFORME * 0.125) + ($EVA_NOTAPROFESOR3INFORME * 0.25)),1);
   $tesisreportes5->EVA_NOTAFINALEXPOSICION = number_format((($EVA_NOTADIRIGEEXPOSICION*0.25)+($EVA_NOTAPROFESOR1EXPOSICION*0.20)+
          ($EVA_NOTAPROFESOR2EXPOSICION *0.20)+($EVA_NOTAPROFESOR3EXPOSICION*0.35)),1);
   $tesisreportes5->EVA_NOTAFINAL = number_format((($tesisreportes5->EVA_NOTAFINALINFORME*0.6) +($tesisreportes5->EVA_NOTAFINALEXPOSICION)*0.4),1);
        $tesisreportes5->save();


/*
       $NOTAFINALINFORME=(($EVA_NOTADIRIGEINFORME *0.5) + ($EVA_NOTAPROFESOR1INFORME *0.125) + ($EVA_NOTAPROFESOR2INFORME * 0.125) + ($EVA_NOTAPROFESOR3INFORME * 0.25));
       $NOTAFINALINFORME=number_format($NOTAFINALINFORME, 1);

        $NOTAFINALEXPOSICION=(($EVA_NOTADIRIGEEXPOSICION*0.25)+($EVA_NOTAPROFESOR1EXPOSICION*0.20)+
          ($EVA_NOTAPROFESOR2EXPOSICION *0.20)+($EVA_NOTAPROFESOR3EXPOSICION*0.35));
        $NOTAFINALEXPOSICION=number_format($NOTAFINALEXPOSICION, 1);


$NOTAFINAL=($NOTAFINALINFORME+$NOTAFINALEXPOSICION)/2;
$NOTAFINAL=number_format($NOTAFINAL, 1);
    //$EVA_NOTAFINALINFORME = $NOTAFINALINFORME;
   //$EVA_NOTAFINALEXPOSICION = $NOTAFINALEXPOSICION;
   //$EVA_NOTAFINAL = $NOTAFINAL;



$evaluaid=$tesisreportes5->id;
$evaluaTRIBUNAL_id=$tesisreportes5->TRIBUNAL_id;


      $evaluafinal= DB::table('EVALUA')
          ->where('id', $evaluaid)
                      ->where('TRIBUNAL_id', $evaluaTRIBUNAL_id)
->update(['EVA_NOTAFINALINFORME' => $NOTAFINALINFORME],[ 'EVA_NOTAFINALEXPOSICION' => $NOTAFINALEXPOSICION],['EVA_NOTAFINAL' => $NOTAFINAL]);
*/






$NOTAFINAL=$tesisreportes5->EVA_NOTAFINAL;

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


        return ['url' => 'tesisreportes5/list'];
    }

    




/*
        public function getUpdate($id,$TRIBUNAL_id)
    {
        //return view('tesisreportes5.update', ['tesisreportes5' => tesisreportes5::find($id)]);


        
    
        //return view('tesisreportes5.update', ['tesisreportes5' => tesisreportes5::find($id)]);


         $TESIS = TESIS::lists('TES_NOMBRE', 'id');
                        $TRIBUNAL = TRIBUNAL::lists('id', 'id');
    
        return view('tesisreportes5.update', ['tesisreportes5' => tesisreportes5::find($id)],compact('TESIS','TRIBUNAL'));

    }

    public function postUpdate($id,$TRIBUNAL_id)
    {
        $tesisreportes5 = tesisreportes5::find($id,$TRIBUNAL_id);
        //$tesisreportes5= DB::table('tesisreportes5')
           
          //  ->where('id',$id)->where('TRIBUNAL_id',$TRIBUNAL_id)
            //->get();

         //$rules = ["TRIBUNAL_id" => "required","id" => "required"];
       //if ($tesisreportes5->id != Input::get('id'))
            $rules = ['id' => 'required',"TRIBUNAL_id" => "required"];
        $validator = validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
                    

  $tesisreportes5->TRIBUNAL_id = Input::get('TRIBUNAL_id');
     
        $tesisreportes5->id = Input::get('id');

//$tesisreportes5= DB::table('tesisreportes5')->insert(
  //  array('id' => $tesisreportes5->id, 'TRIBUNAL_id' => $tesisreportes5->TRIBUNAL_id));
       // $tesisreportes5->TRIBUNAL_id = Input::get('TRIBUNAL_id');
     
        //$tesisreportes5->id = Input::get('id');




        $tesisreportes5->save();
        return ['url' => 'tesisreportes5/list'];
    }*/

    public function getCreate()
    {
        //return view('tesisreportes5.create');

            $TESIS = TESIS::lists('TES_NOMBRE', 'id');
                        $TRIBUNAL = TRIBUNAL::lists('id', 'id');



        return view('tesisreportes5.create',compact('TESIS','TRIBUNAL'));
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
        $tesisreportes5 = new evalua();
   $tesisreportes5->id = Input::get('id');

                                                $tesisreportes5->TRIBUNAL_id = Input::get('TRIBUNAL_id');
   $tesisreportes5->EVA_NOTAGUIA = Input::get('EVA_NOTAGUIA');

   $tesisreportes5->EVA_NOTAINFORMANTE = Input::get('EVA_NOTAINFORMANTE');
   $tesisreportes5->EVA_NOTASALA = Input::get('EVA_NOTASALA');
   $tesisreportes5->EVA_NOTAFINAL = Input::get('EVA_NOTAFINAL');


        $tesisreportes5->save();
        return ['url' => 'tesisreportes5/list'];
    }

    /*public function getDelete($id,$TRIBUNAL_id)
    {


 
    DB::table('EVALUA')->where('id',$id)->where('TRIBUNAL_id',$TRIBUNAL_id)->delete();
        return Redirect('tesisreportes5/list');
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
        return Redirect('tesisreportes5/list');
    }

  





 public function crear_reporte_portesistodos($tipo){

     $vistaurl="tesisreportes5.reporte_por_tesistodos2";
    

     
     return $this->crearPDFtesistodos($vistaurl,$tipo);




    }



      public function crearPDFtesistodos($vistaurl,$tipo)
    {



         $key = 'FichaTesis-';
 $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
 $max = strlen($pattern)-1;
 for($i=0;$i < 16;$i++) $key .= $pattern{mt_rand(0,$max)};

        $tesis=tesis::all();
          $universidads=Universidad::all();
                    $asiste=Asiste::all();
                                        $congreso=Congreso::all(); 
    $participa=Participa::all(); 
    $taller=Taller::all(); 
        $presenta=Presenta::all(); 


    $solicitud=Solicitud::all(); 

      $publica=Publica::all(); 

    $revista=Revista::all(); 
    $posee=Posee::all(); 
    $beneficio=Beneficio::all(); 
    $tiene=Tiene::all(); 
    $trabajo=Trabajo::all(); 
    $profesor=Profesor::all();    
     
    $dirige=Dirige::all();    

    $nucleo=Nucleo::all();    

    $alumno=Alumno::all();    
        $orienta=Orienta::all();    

   $codirige=Codirige::all();    

        $conforman=Conforman::all();    

        $tribunal=Tribunal::all();    
                $evalua=Evalua::all();    






        $date = date('Y-m-d');
        $view =  \View::make($vistaurl, compact('id','tesis', 'universidads','asiste','congreso','participa','taller','presenta','solicitud','publica','revista','posee','beneficio','tiene','trabajo','profesor','dirige','nucleo','alumno','orienta','codirige','conforman','tribunal','evalua','date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        
        if($tipo==1){return $pdf->stream($key);}
        if($tipo==2){return $pdf->download($key); }
    }

    



    public function crear_reporte_portesissolo($id,$TRIBUNAL_id,$tipo)
    {


                  $vistaurl="tesisreportes5.reporte_por_tesissolo2";
    

     
     return $this->crearPDFtesissolo($id,$TRIBUNAL_id,$vistaurl,$tipo);




} 

  public function crearPDFtesissolo($idtesis,$TRIBUNAL_id,$vistaurl,$tipo)
    {

         $key = 'FichaTesis';
 $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
 $max = strlen($pattern)-1;
 for($i=0;$i < 16;$i++) $key .= $pattern{mt_rand(0,$max)};

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

 $date = date('Y-m-d');
        $view =  \View::make($vistaurl, compact('idtesis','TRIBUNAL_id','tesis', 'universidads','concodirige','profesorcodirige','profesordirige','profesor1','profesor2','profesor3','asiste','congreso','participa','taller','presenta','solicitud','publica','revista','posee','beneficio','tiene','trabajo','profesor','dirige','nucleo','alumno','orienta','codirige','conforman','tribunal','evalua','date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        
        if($tipo==1){return $pdf->stream($key);}
        if($tipo==2){return $pdf->download($key); }
}


        $date = date('Y-m-d');
        $view =  \View::make($vistaurl, compact('id','tesis', 'universidads','concodirige','profesorcodirige','profesordirige','profesor1','profesor2','profesor3','asiste','congreso','participa','taller','presenta','solicitud','publica','revista','posee','beneficio','tiene','trabajo','profesor','dirige','nucleo','alumno','orienta','codirige','conforman','tribunal','evalua','date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        
        if($tipo==1){return $pdf->stream($key);}
        if($tipo==2){return $pdf->download($key); }
    }






} 
