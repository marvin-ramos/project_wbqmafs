<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Sensor_DataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()

    {
        DB::table('sensor_data')->insert([
        [
         'water_level'       => '264',
         'ph_level'          => '107',
         'temperature_level' => '220',
         'turbidity_level'	 => '50',
         'created_at' 		 => '2021-04-20 15:40:20'
      	],[
         'water_level'       => '101',
         'ph_level'			 => '333',
         'temperature_level' => '220',
         'turbidity_level'	 => '210',
         'created_at' 		 => '2021-04-20 15:40:21'
      	],[
         'water_level'       => '87',
         'ph_level'          => '80',
         'temperature_level' => '365',
         'turbidity_level'	 => '987',
         'created_at' 		 => '2021-04-20 15:40:22'
      	],[
         'water_level'       => '98',
         'ph_level'          => '321',
         'temperature_level' => '874',
         'turbidity_level'	 => '542',
         'created_at' 		 => '2021-04-20 15:40:23'
      	],[
         'water_level'       => '30',
         'ph_level'			 => '871',
         'temperature_level' => '247',
         'turbidity_level'	 => '975',
         'created_at' 		 => '2021-04-20 15:40:24'
      	],[
         'water_level'       => '101',
         'ph_level'          => '147',
         'temperature_level' => '1542',
         'turbidity_level'	 => '643',
         'created_at' 		 => '2021-04-20 15:40:25'
      	],[
         'water_level'       => '174',
         'ph_level'			 => '80',
         'temperature_level' => '241',
         'turbidity_level'	 => '649',
         'created_at' 		 => '2021-04-20 15:40:26'
      	],[
         'water_level'       => '187',
         'ph_level'			 => '781',
         'temperature_level' => '1354',
         'turbidity_level'	 => '521',
         'created_at' 		 => '2021-04-20 15:40:27'
      	],[
         'water_level'       => '209',
         'ph_level'			 => '241',
         'temperature_level' => '215',
         'turbidity_level'	 => '978',
         'created_at' 		 => '2021-04-20 15:40:28'
      	],[
         'water_level'       => '204',
         'ph_level'          => '209',
         'temperature_level' => '125',
         'turbidity_level'	 => '741',
         'created_at' 		 => '2021-04-20 15:40:29'
      	],[
         'water_level'       => '298',
         'ph_level'   		 => '204',
         'temperature_level' => '847',
         'turbidity_level'	 => '310',
         'created_at' 		 => '2021-04-20 15:40:30'
      	],[
         'water_level'       => '290',
         'ph_level'          => '298',
         'temperature_level' => '321',
         'turbidity_level'	 => '310',
         'created_at' 		 => '2021-03-20 15:40:30'
      	],[
         'water_level'       => '210',
         'ph_level'			 => '781',
         'temperature_level' => '574',
         'turbidity_level'	 => '320',
         'created_at' 		 => '2021-03-20 15:40:31'
      	],[
         'water_level'       => '341',
         'ph_level'          => '871',
         'temperature_level' => '154',
         'turbidity_level'	 => '342',
         'created_at' 		 => '2021-03-20 15:40:32'
      	],[
         'water_level'       => '300',
         'ph_level'          => '341',
         'temperature_level' => '154',
         'turbidity_level'	 => '548',
         'created_at' 		 => '2021-03-20 15:40:33'
      	],[
         'water_level'       => '547',
         'ph_level'          => '300',
         'temperature_level' => '874',
         'turbidity_level'	 => '946',
         'created_at' 		 => '2021-03-20 15:40:34'
      	],[
         'water_level'       => '654',
         'ph_level'			 => '221',
         'temperature_level' => '147',
         'turbidity_level'	 => '213',
         'created_at' 		 => '2021-03-20 15:40:35'
      	],[
         'water_level'       => '920',
         'ph_level'			 => '654',
         'temperature_level' => '321',
         'turbidity_level'	 => '642',
         'created_at' 		 => '2021-03-20 15:40:36'
      	],[
         'water_level'       => '897',
         'ph_level'			 => '102',
         'temperature_level' => '154',
         'turbidity_level'	 => '946',
         'created_at' 		 => '2021-03-20 15:40:37'
      	],[
         'water_level'       => '741',
         'ph_level'			 => '897',
         'temperature_level' =>	'574',
         'turbidity_level'	 => '642',
         'created_at' 		 => '2021-03-20 15:40:38'
      	],[
         'water_level'       => '247',
         'ph_level'			 => '222',
         'temperature_level' =>	'471',
         'turbidity_level'	 => '952',
         'created_at' 		 => '2021-03-20 15:40:39'
      	],[
         'water_level'       => '984',
         'ph_level'			 => '653',
         'temperature_level' => '541',
         'turbidity_level'	 => '201',
         'created_at' 		 => '2021-03-20 15:40:40'
      	],[
         'water_level'       => '587',
         'ph_level'			 => '984',
         'temperature_level' => '862',
         'turbidity_level'	 => '310',
         'created_at' 		 => '2021-02-20 15:40:40'
      	],[
         'water_level'       => '555',
         'ph_level'			 => '587',
         'temperature_level' => '684',
         'turbidity_level'	 => '643',
         'created_at' 		 => '2021-02-20 15:40:41'
      	],[
         'water_level'       => '365',
         'ph_level'			 => '674',
         'temperature_level' => '132',
         'turbidity_level'	 => '310',
         'created_at' 		 => '2021-02-20 15:40:42'
      	],[
         'water_level'       => '784',
         'ph_level'			 => '780',
         'temperature_level' => '985',
         'turbidity_level'	 => '78',
         'created_at' 		 => '2021-02-20 15:40:43'
      	],[
         'water_level'       => '887',
         'ph_level'			 => '560',
         'temperature_level' => '321',
         'turbidity_level'	 => '643',
         'created_at' 		 => '2021-02-20 15:40:44'
      	],[
         'water_level'       => '241',
         'ph_level'			 => '887',
         'temperature_level' => '134',
         'turbidity_level'	 => '61',
         'created_at' 		 => '2021-02-20 15:40:45'
      	],[
         'water_level'       => '78',
         'ph_level'			 => '107',
         'temperature_level' => '541',
         'turbidity_level'	 => '60',
         'created_at' 		 => '2021-02-20 15:40:46'
      	],[
         'water_level'       => '98',
         'ph_level'			 => '178',
         'temperature_level' => '541',
         'turbidity_level'	 => '60',
         'created_at' 		 => '2021-02-20 15:40:47'
      	],[
         'water_level'       => '100',
         'ph_level'			 => '684',
         'temperature_level' => '454',
         'turbidity_level'	 => '312',
         'created_at' 		 => '2021-02-20 15:40:48'
      	],[
         'water_level'       => '302',
         'ph_level'			 => '974',
         'temperature_level' =>	'125',
         'turbidity_level'	 => '314',
         'created_at' 		 => '2021-02-20 15:40:49'
      	],[
      	 'water_level'       => '189',
         'ph_level'			 => '987',
         'temperature_level' => '354',
         'turbidity_level'	 => '964',
         'created_at' 		 => '2021-02-20 15:40:50'
      	],[
      	 'water_level'       => '157',
         'ph_level'			 => '457',
         'temperature_level' =>	'321',
         'turbidity_level'	 => '646',
         'created_at' 		 => '2021-01-20 15:40:01'
      	],[
      	 'water_level'       => '147',
         'ph_level'          => '147',
         'temperature_level' => '211',
         'turbidity_level'	 => '212',
         'created_at' 		 => '2021-01-20 15:40:02'
      	],[
      	 'water_level'       => '478',
         'ph_level'          => '147',
         'temperature_level' => '164',
         'turbidity_level'	 => '200',
         'created_at' 		 => '2021-01-20 15:40:03'
      	],[
      	 'water_level'       => '367',
         'ph_level'          => '620',
         'temperature_level' =>	'135',
         'turbidity_level'	 => '946',
         'created_at' 		 => '2021-01-20 15:40:04'
      	],[
      	 'water_level'       => '247',
         'ph_level'          => '258',
         'temperature_level' => '964',
         'turbidity_level'	 => '151',
         'created_at' 		 => '2021-01-20 15:40:05'
      	],[
      	 'water_level'       => '178',
         'ph_level'	   		 => '100',
         'temperature_level' => '632',
         'turbidity_level'	 => '81',
         'created_at' 		 => '2021-01-20 15:40:06'
      	],[
      	 'water_level'       => '741',
         'ph_level'          => '302',
         'temperature_level' => '541',
         'turbidity_level'	 => '315',
         'created_at' 		 => '2021-01-20 15:40:07'
      	],[
      	 'water_level'       => '474',
         'ph_level'          => '124',
         'temperature_level' => '541',
         'turbidity_level'	 => '978',
         'created_at' 		 => '2021-01-20 15:40:08'
      	],[
      	 'water_level'       => '658',
         'ph_level'			 => '369',
         'temperature_level' => '547',
         'turbidity_level'	 => '946',
         'created_at' 		 => '2021-01-20 15:40:09'
      	],[
      	 'water_level'		 => '478',
         'ph_level'			 => '653',
         'temperature_level' => '545',
         'turbidity_level'	 => '976',
         'created_at' 		 => '2021-01-20 15:40:10'
      	],[
      	 'water_level'		 => '145',
         'ph_level'			 => '987',
         'temperature_level' => '541',
         'turbidity_level'	 => '96',
         'created_at' 		 => '2021-01-20 15:40:01'
      	],[
      	 'water_level'		 => '178',
         'ph_level'			 => '157',
         'temperature_level' => '541',
         'turbidity_level'	 => '60',
         'created_at' 		 => '2021-01-20 15:40:10'
      	],[
      	 'water_level'		 => '278',
         'ph_level'			 => '871',
         'temperature_level' =>	'211',
         'turbidity_level'	 => '110',
         'created_at' 		 => '2021-01-19 15:40:10'
      	],[
      	 'water_level'       => '217',
         'ph_level'          => '781',
         'temperature_level' => '571',
         'turbidity_level'	 => '678',
         'created_at' 		 => '2021-01-19 15:40:11'
      	],[
      	 'water_level'       => '214',
         'ph_level'          => '367',
         'temperature_level' => '821',
         'turbidity_level'	 => '946',
         'created_at' 		 => '2021-01-19 15:40:12'
      	],[
      	 'water_level'		 => '174',
         'ph_level'          => '247',
         'temperature_level' => '541',
         'turbidity_level'	 => '945',
         'created_at' 		 => '2021-01-19 15:40:13'
      	],[
      	 'water_level'       => '341',
         'ph_level'          => '324',
         'temperature_level' => '312',
         'turbidity_level'	 => '642',
         'created_at' 		 => '2021-01-19 15:40:14'
      	],[
      	 'water_level'       => '247',
         'ph_level'          => '474',
         'temperature_level' => '456',
         'turbidity_level'	 => '978',
         'created_at' 		 => '2021-01-19 15:40:15'
      	],[
      	 'water_level'		 => '187',
         'ph_level'			 => '658',
         'temperature_level' => '424',
         'turbidity_level'	 => '847',
         'created_at' 		 => '2021-01-19 15:40:16'
      	],[
      	 'water_level'		 => '145',
         'ph_level'			 => '781',
         'temperature_level' => '654',
         'turbidity_level'	 => '604',
         'created_at' 		 => '2021-01-19 15:40:17'
      	],[
      	 'water_level'       => '1154',
         'ph_level'			 => '145',
         'temperature_level' => '351',
         'turbidity_level'	 => '641',
         'created_at' 		 => '2021-01-19 15:40:18'
      	],[
      	 'water_level'       => '247',
         'ph_level'          => '178',
         'temperature_level' => '324', 
         'turbidity_level'	 => '976',
         'created_at' 		 => '2021-01-19 15:40:19'
      	],[
      	 'water_level'       => '369',
         'ph_level'          => '278',
         'temperature_level' =>	'121',
         'turbidity_level'	 => '976',
         'created_at' 		 => '2021-01-19 15:40:20'
      	],[
      	 'water_level'       => '349',
         'ph_level'			 => '217',
         'temperature_level' => '642',
         'turbidity_level'	 => '642',
         'created_at' 		 => '2021-01-19 15:40:20'
      	],[
      	 'water_level'       => '147',
         'ph_level'			 => '980',
         'temperature_level' => '613',
         'turbidity_level'	 => '643',
         'created_at' 		 => '2021-01-18 15:40:21'
      	],[
      	 'water_level'       => '135',
         'ph_level'			 => '647',
         'temperature_level' => '645',
         'turbidity_level'	 => '978',
         'created_at' 		 => '2021-01-18 15:40:22'
      	],[
      	 'water_level'       => '457',
         'ph_level'			 => '341',
         'temperature_level' => '654',
         'turbidity_level'	 => '643',
         'created_at' 		 => '2021-01-18 15:40:23'
      	],[
      	 'water_level'       => '987',
         'ph_level'			 => '741',
         'temperature_level' => '456',
         'turbidity_level'	 => '691',
         'created_at' 		 => '2021-01-18 15:40:24'
      	],[
      	 'water_level'       => '974',
         'ph_level'			 => '874',
         'temperature_level' => '546',
         'turbidity_level'	 => '643',
         'created_at' 		 => '2021-01-18 15:40:25'
      	],[
      	 'water_level'       => '87',
         'ph_level'			 => '365',
         'temperature_level' => '312',
         'turbidity_level'	 =>	'246',
         'created_at' 		 => '2021-01-18 15:40:26'
      	],[
      	 'water_level'       => '178',
         'ph_level'			 => '220',
         'temperature_level' => '643',
         'turbidity_level'	 => '954',
         'created_at' 		 => '2021-01-18 15:40:21'
      	]
      ]);
    }
}
