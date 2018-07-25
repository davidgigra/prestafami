<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class credit extends Model
{
    protected $table = "credits";
    protected $fillable = ['rode','nDues','interest','client_id','typeCredit_id','period_id'];

    public function clients(){
    	return $this->hasMany('App\client');
    }

    public function typeCredit(){
    	return $this->belongsTo('typeCredit');
    }

    public function period(){
    	return $this->belongsTo('App\period');
    }

    public function dues(){
    	return $this->belongsTo('App\dues');
    }

}
