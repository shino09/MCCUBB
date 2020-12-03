<?php

namespace Magister;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;
class Publica extends Model
{




protected $table = 'PUBLICA';
    protected $fillable = [
    	'id',
    	'REVISTA_id'
    	
    
    
    ];





public static function alumno(){
		return DB::table('PUBLICA')
			->join('ALUMNO','ALUMNO.id','=','PUBLICA.id')
			->select('PUBLICA.*', 'ALUMNO.*')
			->get();
	}


	public static function REVISTA(){
		return DB::table('PUBLICA')
			->join('REVISTA','REVISTA.id','=','PUBLICA.REVISTA_id')
			->select('PUBLICA.*', 'REVISTA.*')
			->get();
	}

} 