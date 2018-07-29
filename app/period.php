<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class period extends Model
{
    protected $table = "periods";
    protected $fillable = ["name"];
}
