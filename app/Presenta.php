<?php

namespace Magister;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;
class PRESENTA extends Model
{




protected $table = 'PRESENTA';
    protected $fillable = [
    	'id',
    	'SOLICITUD_id'
    	
    
    
    ];





public static function alumno(){
		return DB::table('PRESENTA')
			->join('ALUMNO','ALUMNO.id','=','PRESENTA.id')
			->select('PRESENTA.*', 'ALUMNO.*')
			->get();
	}


	public static function SOLICITUD(){
		return DB::table('PRESENTA')
			->join('SOLICITUD','SOLICITUD.id','=','PRESENTA.SOLICITUD_id')
			->select('PRESENTA.*', 'SOLICITUD.*')
			->get();
	}

} 