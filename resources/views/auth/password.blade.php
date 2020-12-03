@extends('layouts.principal')
	@section('content')
	@include('alerts.success')
		<div class="contact-content">
			<div class="top-header span_top">
				<div class="logo">
					<a href="index.html"><img src="" alt="" /></a>
					<p>Magister UBB</p>
				</div>
			<div class="clearfix"></div>
			</div>

			<div class="main-contact">
				 <h3 class="head">Recuperar Contraseña</h3>
				 <p>Le enviaremos un mensaje a su correo para restablecer su contraseña</p>
				 <div class="contact-form">
					 {!!Form::open(['url' => '/password/email'])!!}
					 	<div class="col-md-6 contact-left">
					 		
					 		{!!Form::text('email')!!}
						</div>
						
						{!!Form::submit('Enviar link')!!}
					 {!!Form::close()!!}
				</div>
			</div>
		</div>


		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		
	@endsection