<?php

namespace Magister;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;
class Solicitud extends Model
{



protected $table = 'SOLICITUD';
    protected $fillable = [
    	'id',
    	'SOL_NOMBRE',
    	'SOL_ANO',
    	'SOL_DESCRIPCION',
    	'SOL_SEMESTRE'
    
    ];



} 