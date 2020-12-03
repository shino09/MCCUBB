<?php

namespace Magister;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;
class Tesis extends Model
{


protected $table = 'TESIS';
    protected $fillable = [
    	'id',
    	'TES_NOMBRE',
    	'TES_DESCRIPCION',
    	'TES_ANO',
    	'TES_SEMESTRE',
    	'TES_NOTA',
    	'TES_FECHAINICIO',
    	'TES_FECHAFINAL',
    	'TES_ESTADO',
    	'ALUMNO_id'
        //'contadordirige',
        //'contadorcodirige'
    
    
    ];


public static function alumno(){
		return DB::table('TESIS')
			->join('ALUMNO','ALUMNO.id','=','TESIS.ALUMNO_id')
			->select('TESIS.*', 'ALUMNO.*')
			->get();
	}



} 