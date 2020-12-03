<?php

namespace Magister;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;
class CODIRIGE extends Model
{




protected $table = 'CODIRIGE';
    protected $fillable = [
    	'id',
    	'PROFESOR_id'
    	
    
    
    ];





public static function TESIS(){
		return DB::table('CODIRIGE')
			->join('TESIS','TESIS.id','=','CODIRIGE.id')
			->select('CODIRIGE.*', 'TESIS.*')
			->get();
	}


	public static function PROFESOR(){
		return DB::table('CODIRIGE')
			->join('PROFESOR','PROFESOR.id','=','CODIRIGE.PROFESOR_id')
			->select('CODIRIGE.*', 'PROFESOR.*')
			->get();
	}

} 