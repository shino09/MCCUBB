<?php

namespace Magister;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;
class Tiene extends Model
{




protected $table = 'TIENE';
    protected $fillable = [
    	'id',
    	'TRABAJO_id'
    	
    
    
    ];





public static function alumno(){
		return DB::table('TIENE')
			->join('ALUMNO','ALUMNO.id','=','TIENE.id')
			->select('TIENE.*', 'ALUMNO.*')
			->get();
	}


	public static function TRABAJO(){
		return DB::table('TIENE')
			->join('TRABAJO','TRABAJO.id','=','TIENE.TRABAJO_id')
			->select('TIENE.*', 'TRABAJO.*')
			->get();
	}

} 