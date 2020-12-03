<h2 class="page-header">Editar alumno</h2>
{!! Form::model($alumno,["id"=>"frm","class"=>"form-horizontal"]) !!}
@include("alumno._formupdate")
{!! Form::close() !!} 
