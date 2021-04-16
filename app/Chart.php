<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chart extends Model
{
    protected $fillable = [
    	'water_level',
    	'ph_level',
    	'temperature_level',
    	'turbidity_level',
    ];
}