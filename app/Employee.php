<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Gender;
use App\Status;

class Employee extends Model
{
    protected $table = 'employees';
    protected $fillable = [
    	'firstname',
    	'middlename',
    	'lastname',
    	'gender_id',
    	'age',
    	'birthday',
    	'contact_number',
    	'status_id',
		'address',
		'profile',
		'created_at',
		'updated_at',    	
    ];

    public function gender() {
        return $this->hasOne(Gender::class, 'id','id');
    }

    public function status() {
        return $this->hasOne(Status::class, 'id','id');
    }
}
