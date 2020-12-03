<!--<h2 class="page-header">Nuevo director</h2>
{!! Form::open(["id"=>"frm","class"=>"form-horizontal"]) !!}
@include("director2._form")
{!! Form::close() !!} -->
<h2 class="page-header">Crear nuevo Profesor Director</h2>
{!! Form::model($director,["id"=>"frm","class"=>"form-horizontal"]) !!}
@include("director2._form")
{!! Form::close() !!} 

