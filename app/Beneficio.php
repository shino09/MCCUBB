<?php

namespace Magister;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;
class Beneficio extends Model
{

protected $table = 'BENEFICIO';
    protected $fillable = [
    	'id',
    	'BEN_NOMBRE',
    	'BEN_DESCRIPCION'
    
    ];


} 