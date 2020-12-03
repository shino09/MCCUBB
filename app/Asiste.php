<?php

namespace Magister;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;
class Asiste extends Model
{




protected $table = 'ASISTE';
    protected $fillable = [
    	'id',
    	'CONGRESO_id'
    	
    
    
    ];





public static function alumno(){
		return DB::table('ASISTE')
			->join('ALUMNO','ALUMNO.id','=','ASISTE.id')
			->select('ASISTE.*', 'ALUMNO.*')
			->get();
	}


	public static function congreso(){
		return DB::table('ASISTE')
			->join('CONGRESO','CONGRESO.id','=','ASISTE.CONGRESO_id')
			->select('ASISTE.*', 'CONGRESO.*')
			->get();
	}

} 