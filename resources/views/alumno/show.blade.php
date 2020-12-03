<h2 class="page-header">Datos alumno</h2>
{!! Form::model($alumno,["id"=>"frm","class"=>"form-horizontal"]) !!}
@include("alumno.showdatos")
{!! Form::close() !!} 
