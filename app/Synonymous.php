<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Synonymous extends Eloquent
{
	protected $connection = 'mongodb';

	 protected $collection = 'Synonymous';

       
    public function Data(){
        
         return $this->belongsTo('App\Data');
    
    }
}
