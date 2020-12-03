<?php

namespace Magister;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;
class Colaborador extends Model
{




protected $table = 'COLABORADOR';
    protected $fillable = [
    	'id'
    	
    
    
    ];





public static function profesor(){
		return DB::table('COLABORADOR')
			->join('PROFESOR','PROFESOR.id','=','COLABORADOR.id')
			->select('COLABORADOR.*', 'PROFESOR.*')
			->get();
	}

} 