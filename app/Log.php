<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Log extends Model
{
   protected $fillable = [
    	'user_id',
    	'remarks',
    	'created_at',
		'updated_at', 
    ];

    public function user() {
        return $this->hasOne(User::class, 'id','user_id');
    }
}
