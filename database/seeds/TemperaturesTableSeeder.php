<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TemperaturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('temperatures')->insert([
        [
         'temperature_level'=> '10'
      	],[
         'temperature_level'=> '333'
      	],[
         'temperature_level'=> '101'
      	],[
         'temperature_level'=> '321'
      	],[
         'temperature_level'=> '210'
      	],[
         'temperature_level'=> '147'
      	],[
         'temperature_level'=> '101'
      	],[
         'temperature_level'=> '320'
      	],[
         'temperature_level'=> '241'
      	],[
         'temperature_level'=> '209'
      	],[
         'temperature_level'=> '204'
      	],[
         'temperature_level'=> '298'
      	],[
         'temperature_level'=> '320'
      	],[
         'temperature_level'=> '210'
      	],[
         'temperature_level'=> '341'
      	],[
         'temperature_level'=> '300'
      	],[
         'temperature_level'=> '221'
      	],[
         'temperature_level'=> '654'
      	],[
         'temperature_level'=> '102'
      	],[
         'temperature_level'=> '897'
      	],[
         'temperature_level'=> '222'
      	],[
         'temperature_level'=> '247'
      	],[
         'temperature_level'=> '984'
      	],[
         'temperature_level'=> '587'
      	],[
         'temperature_level'=> '674'
      	],[
         'temperature_level'=> '780'
      	],[
         'temperature_level'=> '560'
      	],[
         'temperature_level'=> '887'
      	],[
         'temperature_level'=> '107'
      	],[
         'temperature_level'=> '178'
      	],[
         'temperature_level'=> '684'
      	],[
         'temperature_level'=> '974'
      	],[
         'temperature_level'=> '987'
      	],[
         'temperature_level'=> '457'
      	],[
         'temperature_level'=> '147'
      	],[
         'temperature_level'=> '147'
      	],[
         'temperature_level'=> '620'
      	],[
         'temperature_level'=> '258'
      	],[
         'temperature_level'=> '100'
      	],[
         'temperature_level'=> '302'
      	],[
         'temperature_level'=> '124'
      	],[
         'temperature_level'=> '369'
      	],[
         'temperature_level'=> '247'
      	],[
         'temperature_level'=> '987'
      	],[
         'temperature_level'=> '157'
      	],[
         'temperature_level'=> '871'
        ],[
      	'temperature_level'=> '478'
      	],[
         'temperature_level'=> '367'
      	],[
         'temperature_level'=> '247'
      	],[
         'temperature_level'=> '324'
      	],[
         'temperature_level'=> '474'
      	],[
         'temperature_level'=> '658'
      	],[
         'temperature_level'=> '478'
      	],[
         'temperature_level'=> '145'
      	],[
         'temperature_level'=> '178'
      	],[
         'temperature_level'=> '278'
      	],[
         'temperature_level'=> '217'
      	],[
         'temperature_level'=> '980'
      	],[
         'temperature_level'=> '647'
      	],[
         'temperature_level'=> '341'
      	],[
         'temperature_level'=> '247'
      	],[
         'temperature_level'=> '874'
      	],[
         'temperature_level'=> '365'
      	],[
         'temperature_level'=> '220'
      	]
      ]);
    }
}
