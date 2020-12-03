<?php


//rutas generar  informes pdf
Route::get('pdfprueba', 'PdfpruebaController@invoice');
Route::get('reportes', 'PdfController@index');
Route::get('crear_reporte_portesis/{tipo}', 'PdfController@crear_reporte_portesis');
Route::get('crear_reporte_poralumnos/{tipo}', 'PdfController@crear_reporte_poralumnos');
Route::get('crear_reporte_porprofesores/{tipo}', 'PdfController@crear_reporte_porprofesores');
Route::get('crear_reporte_poralumnotodos/{tipo}', 'AlumnoreportesController@crear_reporte_poralumnotodos');
Route::get('crear_reporte_poralumnosolo/{id}/{tipo}', 'AlumnoreportesController@crear_reporte_poralumnosolo');
Route::get('crear_reporte_porprofesortodos/{tipo}', 'ProfesorreportesController@crear_reporte_porprofesortodos');
Route::get('crear_reporte_porprofesorsolo/{id}/{tipo}', 'ProfesorreportesController@crear_reporte_porprofesorsolo');
Route::get('crear_reporte_portesissolo3/{id}/{tipo}', 'Tesisreportes3Controller@crear_reporte_portesissolo');
Route::get('crear_reporte_portesistodos3/{tipo}', 'Tesisreportes3Controller@crear_reporte_portesistodos');
Route::get('crear_reporte_portesissolo5/{id}/{TRIBUNAL_id}/{tipo}', 'Tesisreportes5Controller@crear_reporte_portesissolo');
Route::get('crear_reporte_portesistodos5/{tipo}', 'Tesisreportes5Controller@crear_reporte_portesistodos');




//rutas vistas informes 
Route::controller('profesorreportes', 'ProfesorreportesController');
Route::controller('alumnoreportes', 'AlumnoreportesController');
Route::controller('tesisreportes3', 'Tesisreportes3Controller');
Route::controller('tesisreportes5', 'Tesisreportes5Controller');



//rutas vistas para cruds de cada tabla 
Route::controller('revista', 'RevistaController');
Route::controller('profesor', 'ProfesorController');
Route::controller('profesor3', 'Profesor3Controller');
Route::controller('asiste3', 'Asiste3Controller');
Route::controller('colaborador2', 'Colaborador2Controller');
Route::controller('nucleo2', 'Nucleo2Controller');
Route::controller('visitante2', 'Visitante2Controller');
Route::controller('tribunal', 'TribunalController');
Route::controller('participa3', 'Participa3Controller');
Route::controller('presenta3', 'Presenta3Controller');
Route::controller('publica3', 'Publica3Controller');
Route::controller('posee3', 'Posee3Controller');
Route::controller('tiene3', 'Tiene3Controller');
Route::controller('dirige8', 'Dirige8Controller');
Route::controller('codirige7', 'Codirige7Controller');
Route::controller('evalua6', 'Evalua6Controller');
Route::controller('conforman17', 'Conforman17Controller');
Route::controller('orienta4', 'Orienta4Controller');
Route::controller('orienta6', 'Orienta6Controller');
Route::controller('solicitud', 'SolicitudController');
Route::controller('beneficio', 'BeneficioController');
Route::controller('tesis2', 'Tesis2Controller');
Route::controller('trabajo', 'TrabajoController');
Route::controller('universidad', 'UniversidadController');
Route::controller('director2', 'Director2Controller');
Route::controller('alumno', 'AlumnoController');
Route::controller('congreso', 'CongresoController');
Route::controller('taller', 'TallerController');
Route::controller('departamento', 'DepartamentoController');





//vista de funcionalidades basicas del sistema, roles de usuarios ,loguin, inicio, errores 404,recuperar pass, etc
Route::get('contact', 'ContactController@getContact');
Route::post('contact_request','ContactController@getContactUsForm');
Route::get('/','FrontController@index');
Route::get('contacto','FrontController@contacto');
Route::get('reviews','FrontController@reviews');
Route::get('admin','FrontController@admin');
Route::get('hola','FrontController@hola');
Route::get('password/email','Auth\PasswordController@getEmail');
Route::post('password/email','Auth\PasswordController@postEmail');
Route::get('password/reset/{token}','Auth\PasswordController@getReset');
Route::post('password/reset','Auth\PasswordController@postReset');
Route::resource('mail','MailController');

Route::group(['middleware' => 'guest'], function () {
  Route::get('/','FrontController@index');

});

Route::controller('usuario', 'UsuarioController');


Route::resource('log','LogController');
Route::get('logout','LogController@logout');



Route::group(['middleware' => 'guest'], function () {
  Route::get('home','FrontController@index');
    Route::get('hola','FrontController@index');


});

Route::group(['middleware' => 'auth'], function () {
  Route::get('home','FrontController@hola');
    Route::get('hola','FrontController@hola');


});


Route::controllers([
    'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);





Route::get('/login', function()
{
	return View::make('login');
});

