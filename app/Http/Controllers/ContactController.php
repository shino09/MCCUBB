<?php

namespace Magister\Http\Controllers;

use Illuminate\Http\Request;
use Magister\Http\Requests;
use Magister\Http\Controllers\Controller;
use Mail;
use Session;
use Redirect;
use Illuminate\Support\Facades\View;

class ContactController extends Controller {

//Server Contact view:: we will create view in next step
public function getContact(){

return View::make('contact');
}

//Contact Form
public function getContactUsForm(){

//Get all the data and store it inside Store Variable
$data = Input::all();

//Validation rules
$rules = array (
'first_name' => 'required|alpha',
'last_name' => 'required|alpha',
'phone_number'=>'numeric|min:8',
'email' => 'required|email',
'message' => 'required|min:25'
);

//Validate data
$validator = Validator::make ($data, $rules);

//If everything is correct than run passes.
if ($validator -> passes()){

//Send email using Laravel send function
Mail::send('emails.hello', $data, function($message) use ($data)
{
//email 'From' field: Get users email add and name
$message->from($data['email'] , $data['first_name']);
//email 'To' field: cahnge this to emails that you want to be notified.
$message->to('magisterfaceubb@gmail.com', 'my name')->cc('magisterfaceubb@gmail.com')->subject('contact request');

});

return View::make('contact');
}else{
//return contact form with errors
return Redirect::to('/contact')->withErrors($validator);
}
}
}