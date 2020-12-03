<?php

namespace Magister;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;
class Congreso extends Model
{

protected $table = 'CONGRESO';
    protected $fillable = [
    	'id',
    	'CON_NOMBRE',
    	'CON_CIUDAD',
    	'CON_ANO'
    
    ];


} 