<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class wallet extends Model
{
    protected $table = "wallets";
    protected $fillable = ['name'];
    
}
