<?php

namespace Magister;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;
class Director extends Model
{




protected $table = 'DIRECTOR';
    protected $fillable = [
    	'id'
    	
    
    
    ];





public static function profesor(){
		return DB::table('DIRECTOR')
			->join('PROFESOR','PROFESOR.id','=','DIRECTOR.id')
			->select('DIRECTOR.*', 'PROFESOR.*')
			->get();
	}

} 