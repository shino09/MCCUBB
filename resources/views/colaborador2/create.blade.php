<!--<h2 class="page-header">Nuevo colaborador</h2>
{!! Form::open(["id"=>"frm","class"=>"form-horizontal"]) !!}
@include("colaborador2._form")
{!! Form::close() !!} -->
<h2 class="page-header">Crear nuevo Profesor Colaborador</h2>
{!! Form::model($colaborador,["id"=>"frm","class"=>"form-horizontal"]) !!}
@include("colaborador2._form")
{!! Form::close() !!} 

