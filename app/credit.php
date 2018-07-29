<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class credit extends Model
{
    protected $table = "credits";
    protected $fillable = ['rode','nDues','interest','client_id','typeCredit_id','period_id'];
}
