<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class client extends Model
{
    protected $table = "clients";
    protected $fillable = ['data_id','wallet_id','guarantor_id'];
    
}
