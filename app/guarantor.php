<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class guarantor extends Model
{
    protected $table = "guarantors";
    protected $fillable = ['data_id'];
}
