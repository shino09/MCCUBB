<?php

namespace Magister;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;
class Departamento extends Model
{
protected $table = 'DEPARTAMENTO';
    protected $fillable = [
    	'id',
    	'DEP_NOMBRE',
    	'DEP_FACULTAD'
    
    ];



} 