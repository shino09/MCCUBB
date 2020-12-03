<h2 class="page-header">Editar usuario (sin cambio de contraseña)</h2>
{!! Form::model($usuario,["id"=>"frm","class"=>"form-horizontal"]) !!}
@include("usuario._formupdate2")

{!! Form::close() !!} 
