<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class client extends Model
{
    protected $table = "clients";
    protected $fillable = ['data_id','wallet_id','guarantor_id'];

    public function wallet(){
    	return $this->belongsTo('App\wallet');
    }

    public function data(){
    	return this->hasOne('App\data');
    }
    
}
