<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
   protected $fillable = [
    	'user_id',
    	'remarks',
    	'created_at',
		'updated_at', 
    ];

    public function logs() {
        return $this->hasOne(Log::class, 'id','id');
    }
}
