<?php

namespace Magister;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;
class Revista extends Model
{


protected $table = 'REVISTA';
    protected $fillable = [
    	'id',
    	'REV_NOMBRE',
    	'REV_ANO',
    	'REV_DESCRIPCION',
    	'REV_SEMESTRE'
    
    ];

} 