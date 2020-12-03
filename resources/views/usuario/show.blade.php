<h2 class="page-header">Datos usuario</h2>
{!! Form::model($usuario,["id"=>"frm","class"=>"form-horizontal"]) !!}
@include("usuario.showdatos")
{!! Form::close() !!} 
