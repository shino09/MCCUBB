<h2 class="page-header">Editar usuario (con cambio de contraseña obligatorio)</h2>
{!! Form::model($usuario,["id"=>"frm","class"=>"form-horizontal"]) !!}
@include("usuario._formupdate")

{!! Form::close() !!} 
