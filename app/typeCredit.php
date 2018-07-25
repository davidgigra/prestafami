<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class typeCredit extends Model
{
    protected $table = "typeCredits";
    protected $fillable = ['name'];

    public function credits(){
    	return $this->hasMany('App\credit');
    }
}