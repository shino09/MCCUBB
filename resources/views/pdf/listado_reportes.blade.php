@extends('layouts.admin')
    @include('alerts.success')

    @section('content')

<div class="row">
            <div class="col-xs-12">
                <div class="box-header">
                  <h3 class="box-title"> INFORMES TIPO LISTADOS </h3>
                  <div class="box-tools">
                 
                  </div>
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                   
                    <thead><tr>
                      <th>N°</th>
                      <th>Informe</th>
                      <th>Ver</th>
                      <th>Descargar</th>
                    </tr></thead>
                    <tbody>
                    <tr>
                      <td>1</td>
                      <td>Listado de Alumnos</td>
                      <td><a href="crear_reporte_poralumnos/1" target="_blank" ><button class="btn btn-block btn-primary btn-xs">Ver</button></a></td>
                      <td><a href="crear_reporte_poralumnos/2" target="_blank" ><button class="btn btn-block btn-success btn-xs">Descargar</button></a></td>
                    
                  </tr>


                     <tr>
                      <td>2</td>
                      <td>Listado de Profesores</td>
                      <td><a href="crear_reporte_porprofesores/1" target="_blank" ><button class="btn btn-block btn-primary btn-xs">Ver</button></a></td>
                      <td><a href="crear_reporte_porprofesores/2" target="_blank" ><button class="btn btn-block btn-success btn-xs">Descargar</button></a></td>
                    
                    </tr>
  <tr>
                      <td>3</td>
                      <td>Listado de Tesis</td>
                      <td><a href="crear_reporte_portesis/1" target="_blank" ><button class="btn btn-block btn-primary btn-xs">Ver</button></a></td>
                      <td><a href="crear_reporte_portesis/2" target="_blank" ><button class="btn btn-block btn-success btn-xs">Descargar</button></a></td>
                    
                  </tr>


                  
                   
                  </tbody></table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
 </div>

 @stop