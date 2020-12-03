@extends('layouts.principal')
	@section('content')
	@include('alerts.errors')
	@include('alerts.request')
				<div class="header">
			<div class="top-header">
				<div class="logo"  >
					<!--<p style="color: #369;"> Magister Ciencias de la computacion </p>

					<a href="index.html"><img src="images/logoubb.jpg" alt="" /></a>-->
				
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="header-info">
				<h1>Magister UBB</h1>
				{!!Form::open(['route'=>'log.store', 'method'=>'POST'])!!}
					<div class="form-group">
						{!!Form::label('correo','RUT:')!!}	
						{!!Form::text('rut',null,['class'=>'form-control', 'placeholder'=>'Ingrese su RUT'])!!}
					</div>
					<div class="form-group">
						{!!Form::label('contrasena','Contraseña:')!!}	
						{!!Form::password('password',['class'=>'form-control', 'placeholder'=>'Ingrese su Contraseña'])!!}
					</div>
					{!!Form::submit('Iniciar',['class'=>'btn btn-primary'])!!}
				{!!Form::close()!!}
<br>

					
				{!!link_to('password/email', $title = '¿Olvido su contraseña?', $attributes = null, $secure = null)!!}
			</div>
		</div>
	
	@endsection	