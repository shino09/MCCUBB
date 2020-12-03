<?php

namespace Magister;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;
class Posee extends Model
{




protected $table = 'POSEE';
    protected $fillable = [
    	'id',
    	'BENEFICIO_id'
    	
    
    
    ];





public static function alumno(){
		return DB::table('POSEE')
			->join('ALUMNO','ALUMNO.id','=','POSEE.id')
			->select('POSEE.*', 'ALUMNO.*')
			->get();
	}


	public static function BENEFICIO(){
		return DB::table('POSEE')
			->join('BENEFICIO','BENEFICIO.id','=','POSEE.BENEFICIO_id')
			->select('POSEE.*', 'BENEFICIO.*')
			->get();
	}

} 