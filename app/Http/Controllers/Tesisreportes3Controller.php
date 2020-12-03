<?php
namespace Magister\Http\Controllers;



use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


use Illuminate\Http\Request;
use Magister\Http\Requests;
use Magister\Http\Requests\UserCreateRequest;
use Magister\Http\Requests\UserUpdateRequest;
use Magister\Http\Controllers\Controller;
use Magister\User;
use Redirect;
use Illuminate\Routing\Route;


use Magister\Universidad;
use Magister\Profesor;
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

use Magister\Tesis;
use Magister\Dirige;
use Magister\Nucleo;
use Magister\Alumno;

use Magister\Orienta;
use Magister\Codirige;

use Magister\Conforman;
use Magister\Tribunal;

use Magister\Evalua;





use Illuminate\Support\Facades\App;
Use PDF;

class Tesisreportes3Controller extends Controller
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
        return view('tesisreportes3.index');
    }

  public function getList()
    {
      

 Session::put('tesisreportes3_search', Input::has('ok') ? Input::get('search') : (Session::has('tesisreportes3_search') ? Session::get('tesisreportes3_search') : ''));
        Session::put('tesisreportes3_field', Input::has('field') ? Input::get('field') : (Session::has('tesisreportes3_field') ? Session::get('tesisreportes3_field') : 'ALU_PATERNO'));
        Session::put('tesisreportes3_sort', Input::has('sort') ? Input::get('sort') : (Session::has('tesisreportes3_sort') ? Session::get('tesisreportes3_sort') : 'asc'));
        $tesis2sreportes = alumno::where('id', 'like', '%' . Session::get('tesisreportes3_search') . '%')->orWhere('ALU_PATERNO','like',  Session::get('tesisreportes3_search') . '%')->orderBy(Session::get('tesisreportes3_field'), Session::get('tesisreportes3_sort'))->paginate(100);








$tesis= tesis::all(); 
$alumno = tesis::alumno();


                            //$DEPARTAMENTO = Departamento::lists('PRO_NOMBRES', 'id');

                return view('tesisreportes3.list',compact('tesis2sreportes','tesis','alumno'));


                            //$DEPARTAMENTO = Departamento::lists('PRO_NOMBRES', 'id');



        //return view('tesis.list', ['tesis' => $tesis]);
    }

    

  



 public function crear_reporte_portesistodos($tipo){

     $vistaurl="tesisreportes3.reporte_por_tesistodos2";
    

     
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

    



    public function crear_reporte_portesissolo($id,$tipo)
    {


                  $vistaurl="tesisreportes3.reporte_por_tesissolo2";
    

     
     return $this->crearPDFtesissolo($id,$vistaurl,$tipo);




} 

  public function crearPDFtesissolo($id,$vistaurl,$tipo)
    {

         $key = 'FichaTesis';
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





    



} 
