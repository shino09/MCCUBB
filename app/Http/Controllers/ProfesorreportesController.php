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
use Magister\Departamento;

use Magister\Director;

use Magister\Nucleo;

use Magister\Visitante;
use Magister\Colaborador;



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
use Magister\Alumno;

use Magister\Orienta;
use Magister\Codirige;

use Magister\Conforman;
use Magister\Tribunal;

use Magister\Evalua;





use Illuminate\Support\Facades\App;
Use PDF;

class ProfesorreportesController extends Controller
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
        return view('profesorreportes.index');
    }

  public function getList()
    {
        Session::put('profesor_search', Input::has('ok') ? Input::get('search') : (Session::has('profesor_search') ? Session::get('profesor_search') : ''));
        Session::put('profesor_field', Input::has('field') ? Input::get('field') : (Session::has('profesor_field') ? Session::get('profesor_field') : 'PRO_PATERNO'));
        Session::put('profesor_sort', Input::has('sort') ? Input::get('sort') : (Session::has('profesor_sort') ? Session::get('profesor_sort') : 'asc'));
        $PROFESOR = profesor::where('id', 'like', Session::get('profesor_search') . '%')->orWhere('PRO_PATERNO','like',  Session::get('profesor_search') . '%')->orderBy(Session::get('profesor_field'), Session::get('profesor_sort'))->paginate(20);



                            //$DEPARTAMENTO = Departamento::lists('PRO_NOMBRES', 'id');

               // return view('profesor.list',compact('PROFESOR'));

                    $DEPARTAMENTO = profesor::DEPARTAMENTO();


                            //$DEPARTAMENTO = Departamento::lists('PRO_NOMBRES', 'id');

                return view('profesorreportes.list',compact('PROFESOR','DEPARTAMENTO'));


        //return view('profesor.list', ['PROFESOR' => $PROFESOR]);
    }

    

  



 public function crear_reporte_porprofesortodos($tipo){

     $vistaurl="profesorreportes.reporte_por_profesortodos2";
    

     
     return $this->crearPDFprofesortodos($vistaurl,$tipo);




    }



      public function crearPDFprofesortodos($vistaurl,$tipo)
    {



         $key = 'FichaProfesores-';
 $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
 $max = strlen($pattern)-1;
 for($i=0;$i < 16;$i++) $key .= $pattern{mt_rand(0,$max)};

        $profesor=profesor::all();
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
        $director=Director::all();    

        $nucleo=Nucleo::all();    

        $visitante=Visitante::all();    

        $colaborador=Colaborador::all();    


    $nucleo=Nucleo::all();    

    $alumno=Alumno::all();    
        $orienta=Orienta::all();    

   $codirige=Codirige::all();    

        $conforman=Conforman::all();    

        $tribunal=Tribunal::all();    
                $evalua=Evalua::all();    



    $departamento=Departamento::all();    



        $date = date('Y-m-d');
        $view =  \View::make($vistaurl, compact('id','director','nucleo','visitante','colaborador','profesor', 'departamento','universidads','asiste','congreso','participa','taller','presenta','solicitud','publica','revista','posee','beneficio','tiene','trabajo','tesis','dirige','nucleo','alumno','orienta','codirige','conforman','tribunal','evalua','date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        
        if($tipo==1){return $pdf->stream($key);}
        if($tipo==2){return $pdf->download($key); }
    }

    



    public function crear_reporte_porprofesorsolo($id,$tipo)
    {


                  $vistaurl="profesorreportes.reporte_por_profesorsolo2";
    

     
     return $this->crearPDFprofesorsolo($id,$vistaurl,$tipo);




} 

  public function crearPDFprofesorsolo($id,$vistaurl,$tipo)
    {

         $key = 'FichaProfesor-';
 $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
 $max = strlen($pattern)-1;
 for($i=0;$i < 16;$i++) $key .= $pattern{mt_rand(0,$max)};

        $profesor=profesor::all();
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
  $director=Director::all();    

        $nucleo=Nucleo::all();    

        $visitante=Visitante::all();    

        $colaborador=Colaborador::all();    

    $departamento=Departamento::all();    

    $nucleo=Nucleo::all();    

    $alumno=Alumno::all();    
        $orienta=Orienta::all();    

                $codirige=Codirige::all();    

        $conforman=Conforman::all();    

        $tribunal=Tribunal::all();    



                $evalua=Evalua::all();    


        $date = date('Y-m-d');
        $view =  \View::make($vistaurl, compact('id','departamento','profesor','director','nucleo','visitante','colaborador', 'universidads','asiste','congreso','participa','taller','presenta','solicitud','publica','revista','posee','beneficio','tiene','trabajo','tesis','dirige','nucleo','alumno','orienta','codirige','conforman','tribunal','evalua','date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        
        if($tipo==1){return $pdf->stream($key);}
        if($tipo==2){return $pdf->download($key); }
    }




      public function getA()
    {



        $profesor=profesor::all();
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
        $director=Director::all();    

        $nucleo=Nucleo::all();    

        $visitante=Visitante::all();    

        $colaborador=Colaborador::all();    


    $nucleo=Nucleo::all();    

    $alumno=Alumno::all();    
        $orienta=Orienta::all();    

   $codirige=Codirige::all();    

        $conforman=Conforman::all();    

        $tribunal=Tribunal::all();    
                $evalua=Evalua::all();    

        $date = date('Y-m-d');


    $departamento=Departamento::all();    

                return view('profesorreportes.a',compact('date','departamento','profesor','director','nucleo','visitante','colaborador', 'universidads','asiste','congreso','participa','taller','presenta','solicitud','publica','revista','posee','beneficio','tiene','trabajo','tesis','dirige','nucleo','alumno','orienta','codirige','conforman','tribunal','evalua'));

    }







 public function crear_reporte_porprofesortodos3($tipo){

     $vistaurl="profesorreportes.reporte_por_profesortodos3";
    

     
     return $this->crearPDFprofesortodos($vistaurl,$tipo);




    }



      public function crearPDFprofesortodos3($vistaurl,$tipo)
    {



         $key = 'FichaProfesores-';
 $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
 $max = strlen($pattern)-1;
 for($i=0;$i < 16;$i++) $key .= $pattern{mt_rand(0,$max)};

        $profesor=profesor::all();
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
        $director=Director::all();    

        $nucleo=Nucleo::all();    

        $visitante=Visitante::all();    

        $colaborador=Colaborador::all();    


    $nucleo=Nucleo::all();    

    $alumno=Alumno::all();    
        $orienta=Orienta::all();    

   $codirige=Codirige::all();    

        $conforman=Conforman::all();    

        $tribunal=Tribunal::all();    
                $evalua=Evalua::all();    



    $departamento=Departamento::all();    



        $date = date('Y-m-d');
        $view =  \View::make($vistaurl, compact('id','director','nucleo','visitante','colaborador','profesor', 'departamento','universidads','asiste','congreso','participa','taller','presenta','solicitud','publica','revista','posee','beneficio','tiene','trabajo','tesis','dirige','nucleo','alumno','orienta','codirige','conforman','tribunal','evalua','date'))->render();
         $pdf->setPaper('mediaA4', 'portrait');
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        
        if($tipo==1){return $pdf->stream($key);}
        if($tipo==2){return $pdf->download($key); }
    }

    

} 
