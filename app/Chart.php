<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chart extends Model
{
    protected $fillable = [
    	'waterlevel',
    	'phlevel',
    	'templevel',
    	'blevel',
    	'created_at',
    ];
}