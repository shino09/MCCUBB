<?php

namespace Magister;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;
class Conforman extends Model
{




protected $table = 'CONFORMAN';
    protected $fillable = [
    	'id',
    	'TRIBUNAL_id',
    	'CON_tipoprofesor',
    	
    
    
    ];





public static function PROFESOR(){
		return DB::table('CONFORMAN')
			->join('PROFESOR','PROFESOR.id','=','CONFORMAN.id')
			->select('CONFORMAN.*', 'PROFESOR.*')
			->get();
	}


	public static function TRIBUNAL(){
		return DB::table('CONFORMAN')
			->join('TRIBUNAL','TRIBUNAL.id','=','CONFORMAN.TRIBUNAL_id')
			->select('CONFORMAN.*', 'TRIBUNAL.*')
			->get();
	}

} 