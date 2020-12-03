<?php

namespace Magister\Http\Controllers;

use Illuminate\Http\Request;
use Magister\Http\Requests;
use Magister\Http\Controllers\Controller;
use Magister\Movie;

class FrontController extends Controller
{
  public function __construct(){
    $this->middleware('auth',['only' => 'admin']);
  }

   public function index(){
        return view('index');
   }

   public function contacto(){
        return view('contacto');
   }

   

   public function error(){
        return view('errors.503');
   }

   public function admin(){
        return view('admin.index');
   }


    public function hola(){
        return view('layouts.hola');
   }
}
