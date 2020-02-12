<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    
    public function category(){
    	 return $this->belongsTo('App\category');
    }
    public function User(){
    	 return $this->belongsTo('App\User');
    }
}
