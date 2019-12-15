<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
class Data extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'data';
       

     public function synonymous(){
        return $this->hasMany('App\Synonymous','syn_id');
    }

    public function verifsyn()
    {

    	if ($this->synonymous()->count() == 0 ){
    		$exist = false; 
    	} else {
    		$exist =true;
    	}
    	return $exist;
    }

}
