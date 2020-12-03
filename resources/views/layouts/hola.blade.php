@extends('layouts.admin')
  

    @section('content')


  <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
     @include('alerts.success')
    @include('alerts.errors')
      <h1>
        Bienvenido al Sistema Web para la Gestión del Magister de Ciencias en la Computación de la  Facultad de Ciencias Empresariales
        <small>Universidad del Bío-Bío</small>
      </h1>
     
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
        <a href="{!!URL::to('/alumno')!!}">  <div class="info-box">
            <span class="info-box-icon bg-aqua"> <i class="fa fa-male"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Alumnos</span>
              <span class="info-box-number"><small></small></span>
            </div>
            <!-- /.info-box-content -->
          </div></a>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
         <a href="{!!URL::to('/profesor')!!}">  <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-graduation-cap"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Profesores</span>
              <span class="info-box-number"></span>
            </div>
            <!-- /.info-box-content -->
          </div></a>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
         <a href="{!!URL::to('/tesis2')!!}">  <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-file-text"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Tesis</span>
              <span class="info-box-number"></span>
            </div>
            <!-- /.info-box-content -->
          </div></a>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <a href="{!!URL::to('/alumnoreportes')!!}"> <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-line-chart"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Informes</span>
              <span class="info-box-number"></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div></a>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Navegación</h3>

            
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-8">
                  <p class="text-center">
                    <strong>Vista estandar</strong>
                  </p>

               <div style="text-align: left"><img src="images/grilla2.png" width="600" /></div>

 <div class="box-footer">
              <div class="row">
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> </span>
                    <h5 class="description-header">Grilla de datos</h5>
                    <span class="description-text">Datos mas relevantes de cada vista</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <span class="description-percentage text-green"><i class="fa fa-caret-up"></i></span>
                    <h5 class="description-header">Busquedas</h5>
                    <span class="description-text">Implementación de busquedas en todas las vistas</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> </span>
                    <h5 class="description-header">Paginación</h5>
                    <span class="description-text">Implementación de la opción de la paginación</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              
              </div>
              <!-- /.row -->
            </div>
                 
                  <!-- /.chart-responsive -->
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                  <p class="text-center">
                      <strong>Botones</strong>
                  </p>
          <!-- Info Boxes Style 2 -->

            <div class="info-box bg-green">
            <span class="info-box-icon"><i class="fa fa-plus"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Crear nuevo registro</span>
                               <span class="description-text">Llenando un formulario o seleccionando datos por busqueda de creación</span>

            </div>
            <!-- /.info-box-content -->
          </div>
          <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="fa fa-eye"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Ver o Mostrar Datos </span>
              <span class="description-text">Selecionando a travez de una busqueda</span>
          
                  
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        
          <!-- /.info-box -->
        
          <!-- /.info-box -->
          <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="fa fa-list"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Editar un registro existente</span>
          <span class="description-text">Editando un formulario o seleccionando datos por busqueda de edición</span>
            </div>
            <!-- /.info-box-content -->
          </div>



            <div class="info-box bg-red">
            <span class="info-box-icon"><i class="fa fa-times"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Eliminar un registro existente</span>
             <span class="description-text">Selecionando a travez de una busqueda</span>
            </div>
            <!-- /.info-box-content -->
          </div>

                  <!-- /.progress-group -->
                </div>

                <!-- /.col -->
              </div>

              <!-- /.row -->
            </div>
            <!-- ./box-body -->
          
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->



 <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Busquedas y validaciones</h3>

            
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-8">
                  <p class="text-center">
                    <strong>Validaciones</strong>
                  </p>

               <div style="text-align: left"><img src="images/validacion.png" width="500" /></div>

 <div class="box-footer">
              <div class="row">
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> </span>
                    <h5 class="description-header">RUT</h5>
                    <span class="description-text">Validaciones de RUT<p>
                    
                    Solo RUT reales</p></span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <span class="description-percentage text-green"><i class="fa fa-caret-up"></i></span>
                    <h5 class="description-header">Validaciones basicas</h5>
                    <span class="description-text">
                    Validaciones de campos vacios 
                    Validaciones por tipo de datos
                    Validaciones por espacios en blanco</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> </span>
                    <h5 class="description-header">Validaciones complejas</h5>
                    <span class="description-text">Validar que no hallan 2 o mas registros con una combinacion de campos iguales</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              
              </div>
              <!-- /.row -->
            </div>
                  
                  <!-- /.chart-responsive -->
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                  <p class="text-center">
                    <strong>Busquedas</strong>
                  </p>

                  <div class="col-sm-12 form-group">
    <div class="input-group">
        <input class="form-control" id="search" value="{{ Session::get('profesor_search') }}"
               onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('profesorreportes/list')}}?ok=1&search='+this.value)"
               placeholder="Buscar..."
               type="text">

        <div class="input-group-btn">
            <button type="button" class="btn btn-default"
                    onclick="ajaxLoad('{{url('profesorreportes/list')}}?ok=1&search='+$('#search').val())"><i
                        class="fa fa-search"></i>
            </button>
        </div>
    </div>
</div>

                  <div class="progress-group">
                    <span class="progress-text">RUT:     [Alumno,Profesor,Tesis,etc]</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-aqua" style="width: 100%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">Apellido Paterno:    [Alumno,Profesor,Tesis,etc]</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-blue" style="width: 100%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">Nombre Propio:   [Trabajo,Congreso,Universidad,etc]</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-green" style="width: 100%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">Buscar 1 solo campo a la vez</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-yellow" style="width: 100%"></div>
                    </div>
                  </div>

                  <div class="progress-group">
                    <span class="progress-text">Para resetear una busqueda se debe dejar barra en blanco,  borrando todo lo que se encuentre  escrito y apretar enter</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-red" style="width: 100%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- ./box-body -->
          
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
   



      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Informes PDF y opciones</h3>

            
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-8">
                  <p class="text-center">
                    <strong>Informes PDF</strong>
                  </p>

               <div style="text-align: left"><img src="images/reporte.png" width="500" /></div>

 <div class="box-footer">
              <div class="row">
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> </span>
                    <h5 class="description-header">Alumnos</h5>
                    <span class="description-text">Informes detallados  por Alumnos</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <span class="description-percentage text-green"><i class="fa fa-caret-up"></i></span>
                    <h5 class="description-header">Profesores</h5>
                    <span class="description-text">Informes detallados  por Profesores</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> </span>
                    <h5 class="description-header">Tesis</h5>
                    <span class="description-text">Informes detallados por Tesis</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              
              </div>
              <!-- /.row -->
            </div>
                  
                  <!-- /.chart-responsive -->
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                  <p class="text-center">
               <p class="text-center">
                      <strong>Opciones</strong>
                  </p>
          <!-- Info Boxes Style 2 -->

            <div class="info-box bg-blue">
            <span class="info-box-icon"><i class="fa fa-eye"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Ver todos</span>
           <span class="progress-description">
Ver informe PDF de todos los                  </span>
 <span class="progress-description">
registros                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <div class="info-box bg-green">
            <span class="info-box-icon"><i class="fa fa-save"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Descargar todos </span>
            <span class="progress-description">
Descargar informe PDF de todos los                </span>
<span class="progress-description">
registros                  </span>
                  
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        
          <!-- /.info-box -->
        
          <!-- /.info-box -->
          <div class="info-box bg-blue">
            <span class="info-box-icon"><i class="fa fa-eye"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Ver individual</span>
           <span class="progress-description">
Ver informe PDF de un registro               </span>
<span class="progress-description">
en especifico                 </span>
            </div>
            <!-- /.info-box-content -->
          </div>



            <div class="info-box bg-green">
            <span class="info-box-icon"><i class="fa fa-save"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Descargar individual </span>
              <span class="progress-description">
Descargar informe PDF de un                </span>
<span class="progress-description">
registro en especifico                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
           
            <!-- /.box-footer -->
          </div>
            <!-- /.info-box-content -->
          </div>
                  <!-- /.progress-group -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- ./box-body -->
          
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->


       
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  <!-- /.content-wrapper -->


    @stop