<?php

namespace Magister;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;
class Taller extends Model
{

protected $table = 'TALLER';
    protected $fillable = [
    	'id',
    	'TAL_NOMBRE',
    	'TAL_ANO'
    
    ];


} 