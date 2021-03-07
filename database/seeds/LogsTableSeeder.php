<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('logs')->insert([
        [
         'user_id'=> '1',
         'remarks'=>'has logged in at the system in',
      	],[
    	   'user_id'=> '2',
         'remarks'=>'has logged in at the system in',
      	],[
    	   'user_id'=> '3',
         'remarks'=>'has logged in at the system in',
      	]
      ]);
    }
}
