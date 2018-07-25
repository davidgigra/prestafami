<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dues extends Model
{
    protected $table = "dues";
    protected $fillable = ['id','number','balance','capital','dExpiration','credit_id'];

    public function credits(){
    	return $this->hasMany('App\credit');
    }

}
