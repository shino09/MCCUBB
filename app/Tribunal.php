<?php

namespace Magister;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;
class Tribunal extends Model
{


protected $table = 'TRIBUNAL';
    protected $fillable = [
    	'id',
    	'TRI_FECHACREACION'
        
    ];




} 