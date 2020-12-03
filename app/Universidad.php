<?php

namespace Magister;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;
class Universidad extends Model
{


protected $table = 'UNIVERSIDAD';
    protected $fillable = [
    	'id',
    	'UNI_NOMBRE',
    	'UNI_CIUDAD'
    
    ];



   public function users()
      {
        return $this->hasMany('Magister\Universidad', 'name', 'id');
      }


} 