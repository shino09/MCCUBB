<?php

namespace Magister;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;
class Trabajo extends Model
{


protected $table = 'TRABAJO';
    protected $fillable = [
    	'id',
    	'TRA_NOMBRE',
    	'TRA_CIUDAD',
    	'TRA_EMPRESA'
    
    ];


} 