<?php

namespace Magister;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;
class Orienta extends Model
{




protected $table = 'ORIENTA';
    protected $fillable = [
    	'id',
    	'ALUMNO_id'
    	
    
    
    ];





public static function PROFESOR(){
		return DB::table('ORIENTA')
			->join('PROFESOR','PROFESOR.id','=','ORIENTA.id')
			->select('ORIENTA.*', 'PROFESOR.*')
			->get();
	}


	public static function ALUMNO(){
		return DB::table('ORIENTA')
			->join('ALUMNO','ALUMNO.id','=','ORIENTA.ALUMNO_id')
			->select('ORIENTA.*', 'ALUMNO.*')
			->get();
	}




} 
