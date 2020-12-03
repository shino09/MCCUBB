<?php

namespace Magister;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;
class Visitante extends Model
{




protected $table = 'VISITANTE';
    protected $fillable = [
    	'id',
    	'VIS_UNIVERSIDAD',
    	'VIS_PAIS'
    	
    
    
    ];





public static function profesor(){
		return DB::table('VISITANTE')
			->join('PROFESOR','PROFESOR.id','=','VISITANTE.id')
			->select('VISITANTE.*', 'PROFESOR.*')
			->get();
	}

} 