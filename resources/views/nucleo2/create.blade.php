<!--<h2 class="page-header">Nuevo nucleo</h2>
{!! Form::open(["id"=>"frm","class"=>"form-horizontal"]) !!}
@include("nucleo2._form")
{!! Form::close() !!} -->
<h2 class="page-header">Crear nuevo Profesor Nucleo</h2>
{!! Form::model($nucleo,["id"=>"frm","class"=>"form-horizontal"]) !!}
@include("nucleo2._form")
{!! Form::close() !!} 

