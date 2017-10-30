<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    // public function getBodyAttribute($value){
    // 	return ucfirst($value);
    // }


    public function setTitleAttribute($value){
    	return $this->attributes['title'] = ucfirst($value);
    }
    
    public function setBodyAttribute($value){
    	return $this->attributes['body'] = ucfirst($value);
    }
}
