<?php

namespace Magister;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;
class Profesor extends Model
{



protected $table = 'PROFESOR';
    protected $fillable = [
    	'id',
    	'PRO_NOMBRES',
    	'PRO_PATERNO',
    	'PRO_MATERNO',
    	'PRO_EMAIL',
    	'PRO_TITULO',
    	'PRO_GRADO',
    	'PRO_TELEFONO',
    	'DEPARTAMENTO_id'
    
    
    ];


public static function DEPARTAMENTO(){
		return DB::table('PROFESOR')
			->join('DEPARTAMENTO','DEPARTAMENTO.id','=','PROFESOR.DEPARTAMENTO_id')
			->select('PROFESOR.*', 'DEPARTAMENTO.*')
			->get();
	}





} 