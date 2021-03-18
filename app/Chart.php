<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chart extends Model
{
    protected $fillable = [
    	'water_level',
    	'temperature_level',
    	'ph_level',
    	'turbidity_level',
    ];
}
