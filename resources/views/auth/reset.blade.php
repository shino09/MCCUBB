@extends('layouts.principal')
	@section('content')
	@include('alerts.success')
		<div class="contact-content">
			<div class="top-header span_top">
				<div class="logo">
					<a href="index.html"><img src="images/logo.png" alt="" /></a>
					<p>Magister UBB</p>
				</div>
			<div class="clearfix"></div>
			</div>

			<div class="main-contact">
				 <h3 class="head">Restablecer Contraseña</h3>
				 <p>Ingrese sus datos porfavor</p>
				 <div class="contact-form">
					 {!!Form::open(['url' => '/password/reset'])!!}
					 	<div class="col-md-6 contact-left">
					 		{!!Form::hidden('token',$token,null)!!}
<h5>Ingrese su correo</h5>
					 		{!!Form::text('email',null,['value' => "{{old('email')}}"])!!}
<h5>Ingrese su nueva conraseña</h5>

					 		{!!Form::password('password')!!}
					 		<h5>Ingrese su nueva contraseña otravez</h5>

					 		{!!Form::password('password_confirmation')!!}
						</div>
						
						{!!Form::submit('Restablecer contraseña')!!}
					 {!!Form::close()!!}
				</div>
			</div>
		</div>

		<br>
			<br>
				<br>	<br>	<br>


					<br>	<br>	<br>	<br>	<br>
	@endsection