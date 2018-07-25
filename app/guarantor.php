<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class guarantor extends Model
{
    protected $table = "guarantors";
    protected $fillable = ['data_id'];

    public function data(){
    	return $this->belongsto('App\data');
    }

    public function clients(){
    	return $this->hasMany('App\client');
    }


}
