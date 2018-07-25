<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class wallet extends Model
{
    protected $table = "wallets";
    protected $fillable = ['name'];

    public function clients(){
    	return $this->hasMany('App\client');
    }
    
}
