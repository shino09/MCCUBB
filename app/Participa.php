<?php

namespace Magister;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;
class PARTICIPA extends Model
{




protected $table = 'PARTICIPA';
    protected $fillable = [
    	'id',
    	'TALLER_id'
    	
    
    
    ];



public static function alumno(){
		return DB::table('PARTICIPA')
			->join('ALUMNO','ALUMNO.id','=','PARTICIPA.id')
			->select('PARTICIPA.*', 'ALUMNO.*')
			->get();
	}


	public static function TALLER(){
		return DB::table('PARTICIPA')
			->join('TALLER','TALLER.id','=','PARTICIPA.TALLER_id')
			->select('PARTICIPA.*', 'TALLER.*')
			->get();
	}

} 