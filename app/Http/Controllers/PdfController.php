<?php

namespace Magister\Http\Controllers;

use Illuminate\Http\Request;

use Magister\Http\Requests;
use Magister\Http\Controllers\Controller;
use Magister\User;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;



use Magister\Http\Requests\UserCreateRequest;
use Magister\Http\Requests\UserUpdateRequest;
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
use Magister\Director;
use Magister\Visitante;
use Magister\Departamento;

use Magister\Colaborador;



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

class PdfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



  public function __construct(){
        $this->middleware('auth');
       // $this->middleware('admin');
        $this->beforeFilter('@find',['only' => ['edit','update','destroy']]);
    }

    public function find(Route $route){
        $this->user = User::find($route->getParameter('usuario'));
    }

    public function index()
    {
        return view("pdf.listado_reportes");
    }









      public function crearPDF($vistaurl,$tipo)
    {

         $key = 'Reporte-';
 $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
 $max = strlen($pattern)-1;
 for($i=0;$i < 16;$i++) $key .= $pattern{mt_rand(0,$max)};
     $universidad=Universidad::all();
      $alumno=Alumno::all();


        $date = date('Y-m-d');
        $view =  \View::make($vistaurl, compact('universidad', 'alumno','date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        
        if($tipo==1){return $pdf->stream($key);}
        if($tipo==2){return $pdf->download($key); }
    }


    public function crear_reporte_poruniversidad($tipo){

     $vistaurl="pdf.reporte_por_universidad";
     
     return $this->crearPDF( $vistaurl,$tipo);




    }





















 public function crear_reporte_pordirector($tipo){

     $vistaurl="pdf.reporte_por_director";
    

     
     return $this->crearPDFdirector($vistaurl,$tipo);




    }





      public function crearPDFdirector($vistaurl,$tipo)
    {

         $key = 'Reporte-';
 $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
 $max = strlen($pattern)-1;
 for($i=0;$i < 16;$i++) $key .= $pattern{mt_rand(0,$max)};

        $profesor=Profesor::all();
          $director=Director::all();
                 




        $date = date('Y-m-d');
        $view =  \View::make($vistaurl, compact('profesor', 'director','date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        
        if($tipo==1){return $pdf->stream($key);}
        if($tipo==2){return $pdf->download($key); }
    }









 public function crear_reporte_portesis($tipo){

     $vistaurl="pdf.reporte_portesis";
    

     
     return $this->crearPDFtesis($vistaurl,$tipo);




    }



      public function crearPDFtesis($vistaurl,$tipo)
    {



         $key = 'ListadodeTesis-';
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





 public function crear_reporte_poralumnos($tipo){

     $vistaurl="pdf.reporte_poralumnos";
    

     
     return $this->crearPDFalumnos($vistaurl,$tipo);




    }



      public function crearPDFalumnos($vistaurl,$tipo)
    {



         $key = 'ListadodeAlumnos';
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

    



 public function crear_reporte_porprofesores($tipo){

     $vistaurl="pdf.reporte_porprofesores";
    

     
     return $this->crearPDFporprofesores($vistaurl,$tipo);




    }



      public function crearPDFporprofesores($vistaurl,$tipo)
    {



         $key = 'ListadodeProfesores-';
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

    


    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
