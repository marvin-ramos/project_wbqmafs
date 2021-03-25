<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ponds extends Model
{
    protected $fillable = [
    	'temperature_id',
    	'water_id',
    	'turbidity_id',
    	'ph_level_id',
    	'created_at',
    ];
}
