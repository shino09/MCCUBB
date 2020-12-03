<?php

namespace Magister;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;
class Dirige extends Model
{




protected $table = 'DIRIGE';
    protected $fillable = [
    	'id',
    	'NUCLEO_id',
    	'contador'
    	
    
    
    ];





public static function TESIS(){
		return DB::table('DIRIGE')
			->join('TESIS','TESIS.id','=','DIRIGE.id')
			->select('DIRIGE.*', 'TESIS.*')
			->get();
	}


	public static function NUCLEO(){
		return DB::table('DIRIGE')
			->join('NUCLEO','NUCLEO.id','=','DIRIGE.NUCLEO_id')
			->select('DIRIGE.*', 'NUCLEO.*')
			->get();
	}


	public static function PROFESOR(){
		return DB::table('DIRIGE')
			->join('NUCLEO','NUCLEO.id','=','DIRIGE.NUCLEO_id')
						->join('PROFESOR','PROFESOR.id','=','NUCLEO.id')

			->select('DIRIGE.*', 'PROFESOR.*')
			->get();
	}



	  public function scopeSearch($query, $equipo)
    {
        return $query->where('id','LIKE',"%$equipo%");
    }

} 