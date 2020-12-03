<?php

namespace Magister;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;
class Alumno extends Model
{



protected $table = 'ALUMNO';
    protected $fillable = [
    	'id',
    	'ALU_NOMBRES',
    	'ALU_PATERNO',
    	'ALU_MATERNO',
    	'ALU_EMAIL',
    	'ALU_TITULO',
    	'ALU_GRADO',
    	'ALU_TELEFONO',
    	'ALU_PUNTAJE',
    	'ALU_ESTADO',
        'ALU_ANOINGRESO',
    	'UNIVERSIDAD_id'
    	
    
    
    ];


public static function UNIVERSIDAD(){
		return DB::table('ALUMNO')
			->join('UNIVERSIDAD','UNIVERSIDAD.id','=','ALUMNO.UNIVERSIDAD_id')
			->select('ALUMNO.*', 'UNIVERSIDAD.*')
			->get();
	}



} 