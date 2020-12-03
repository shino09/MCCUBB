<!--<h2 class="page-header">Nuevo visitante</h2>
{!! Form::open(["id"=>"frm","class"=>"form-horizontal"]) !!}
@include("visitante2._form")
{!! Form::close() !!} -->
<h2 class="page-header">Crear nuevo Profesor Visitante</h2>
{!! Form::model($visitante,["id"=>"frm","class"=>"form-horizontal"]) !!}
@include("visitante2._form")
{!! Form::close() !!} 

