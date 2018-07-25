<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class data extends Model
{
    protected $table = "data";
    protected $fillable = ['name','lastName','cedula','email','address'];

    public function Users(){
    	return $this->hasOne('App\User');
    }

    public function guarantors(){
    	return $this->hasOne('App\guarantor');
    }

    public function clients(){
    	return $this->hasOne('App\client');
    }
}
