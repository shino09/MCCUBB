<?php

namespace Magister;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;
class Nucleo extends Model
{




protected $table = 'NUCLEO';
    protected $fillable = [
    	'id'
    	
    
    
    ];





public static function profesor(){
		return DB::table('NUCLEO')
			->join('PROFESOR','PROFESOR.id','=','NUCLEO.id')
			->select('NUCLEO.*', 'PROFESOR.*')
			->get();
	}

} 