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
use Magister\Alumno;
use Magister\Asiste;
use Magister\Congreso;
use Magister\Participa;

use Magister\Codirige;

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
use Magister\Profesor;

use Magister\Orienta;




use Illuminate\Support\Facades\App;
Use PDF;

class AlumnoreportesController extends Controller
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
        return view('alumnoreportes.index');
    }

    public function getList()
    {
        Session::put('alumnoreportes_search', Input::has('ok') ? Input::get('search') : (Session::has('alumnoreportes_search') ? Session::get('alumnoreportes_search') : ''));
        Session::put('alumnoreportes_field', Input::has('field') ? Input::get('field') : (Session::has('alumnoreportes_field') ? Session::get('alumnoreportes_field') : 'ALU_NOMBRES'));
        Session::put('alumnoreportes_sort', Input::has('sort') ? Input::get('sort') : (Session::has('alumnoreportes_sort') ? Session::get('alumnoreportes_sort') : 'asc'));
        $alumnos = alumno::where('id', 'like', Session::get('alumnoreportes_search') . '%')

                 ->orWhere('ALU_PATERNO','like',  Session::get('alumnoreportes_search') . '%')

            ->orderBy(Session::get('alumnoreportes_field'), Session::get('alumnoreportes_sort'))->paginate(20);

                
                $universidads = alumno::universidad();


                            //$universidads = universidad::lists('ALU_NOMBRES', 'id');

                                return view('alumnoreportes.list',compact('alumnos','universidads'));


                //return view('alumno.list',compact('alumnos'));


        //return view('alumno.list', ['alumnos' => $alumnos]);
    }

    

  



 public function crear_reporte_poralumnotodos($tipo){

     $vistaurl="alumnoreportes.reporte_por_alumnotodos2";
    

     
     return $this->crearPDFalumnotodos($vistaurl,$tipo);




    }



      public function crearPDFalumnotodos($vistaurl,$tipo)
    {



         $key = 'FichaAlumnos';
 $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
 $max = strlen($pattern)-1;
 for($i=0;$i < 16;$i++) $key .= $pattern{mt_rand(0,$max)};

        $alumno=Alumno::all();
          $universidads=Universidad::all();
                    $asiste=Asiste::all();
                                        $congreso=Congreso::all(); 
    $participa=Participa::all(); 
    $taller=Taller::all(); 
        $presenta=Presenta::all(); 


    $solicitud=Solicitud::all(); 

      $publica=Publica::all(); 

    $revista=Revista::all(); 
        $codirige=Codirige::all(); 

    $posee=Posee::all(); 
    $beneficio=Beneficio::all(); 
    $tiene=Tiene::all(); 
    $trabajo=Trabajo::all(); 
    $tesis=Tesis::all();    
     
    $dirige=Dirige::all();    

    $nucleo=Nucleo::all();    

    $profesor=Profesor::all();    
        $orienta=Orienta::all();    




        $date = date('Y-m-d');
        $view =  \View::make($vistaurl, compact('alumno', 'universidads','asiste','congreso','participa','taller','presenta','solicitud','publica','revista','posee','codirige','beneficio','tiene','trabajo','tesis','dirige','nucleo','profesor','orienta','date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        
        if($tipo==1){return $pdf->stream($key);}
        if($tipo==2){return $pdf->download($key); }
    }

    



    public function crear_reporte_poralumnosolo($id,$tipo)
    {


                  $vistaurl="alumnoreportes.reporte_por_alumnosolo2";
    

     
     return $this->crearPDFalumnosolo($id,$vistaurl,$tipo);




} 

  public function crearPDFalumnosolo($id,$vistaurl,$tipo)
    {

         $key = 'FichaAlumno';
 $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
 $max = strlen($pattern)-1;
 for($i=0;$i < 16;$i++) $key .= $pattern{mt_rand(0,$max)};

        $alumno=Alumno::all();
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
    $tesis=Tesis::all();    
     
    $dirige=Dirige::all();    
        $codirige=Codirige::all();    


    $nucleo=Nucleo::all();    

    $profesor=Profesor::all();    
        $orienta=Orienta::all();    




        $date = date('Y-m-d');
        $view =  \View::make($vistaurl, compact('id','alumno', 'universidads','asiste','congreso','participa','taller','presenta','solicitud','publica','revista','posee','codirige','beneficio','tiene','trabajo','tesis','dirige','nucleo','profesor','orienta','date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        
        if($tipo==1){return $pdf->stream($key);}
        if($tipo==2){return $pdf->download($key); }
    }





} 
