<?php

namespace Magister;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;
class Evalua extends Model
{




protected $table = 'EVALUA';
    protected $fillable = [
    	'id',
    	'TRIBUNAL_id',
    	'EVA_NOTADIRIGEINFORME',
		'EVA_NOTAPROFESOR1INFORME',
		'EVA_NOTAPROFESOR2INFORME',
       	'EVA_NOTAPROFESOR3INFORME',
       	'EVA_NOTAFINALINFORME',
		'EVA_NOTADIRIGEEXPOSICION',
    	'EVA_NOTAPROFESOR1EXPOSICION',
		'EVA_NOTAPROFESOR2EXPOSICION',
		'EVA_NOTAPROFESOR3EXPOSICION',
       	'EVA_NOTAFINALEXPOSICION',
		
		'EVA_NOTAFINAL',





    
    
    ];





public static function TESIS(){
		return DB::table('EVALUA')
			->join('TESIS','TESIS.id','=','EVALUA.id')
			->select('EVALUA.*', 'TESIS.*')
			->get();
	}


	public static function TRIBUNAL(){
		return DB::table('EVALUA')
			->join('TRIBUNAL','TRIBUNAL.id','=','EVALUA.TRIBUNAL_id')
			->select('EVALUA.*', 'TRIBUNAL.*')
			->get();
	}

	public static function alumno(){
		return DB::table('EVALUA')
								->join('TESIS','TESIS.id','=','EVALUA.id')

			->join('ALUMNO','ALUMNO.id','=','TESIS.ALUMNO_id')
->select('EVALUA.*', 'ALUMNO.*','TESIS.*')
			->get();
	}

} 