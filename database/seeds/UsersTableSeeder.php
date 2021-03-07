<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
        [
         'employee_id'=> '1',
         'email'=>'admin@admin.com',
         'role_id'=>'1',
         'password' => Hash::make('admin'),
      	],[
    	 'employee_id'=> '2',
         'email'=>'user@user.com',
         'role_id'=>'2',
         'password' => Hash::make('user'),
      	],[
    	 'employee_id'=> '3',
         'email'=>'guest@guest.com',
         'role_id'=>'3',
         'password' => Hash::make('guest'),
      	]
      ]);
    }
}
