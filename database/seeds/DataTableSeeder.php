<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('data')->insert([
        	[
                'waterlevel' => '2',
                'phlevel' => '12',
                'templevel' => '30',
                'blevel' => '1',
                'created_at' => '2021-04-21 03:23:16'
            ],
            [
                'waterlevel' => '2',
                'phlevel' => '12',
                'templevel' => '30',
                'blevel' => '1',
                'created_at' => '2021-04-21 03:23:16'
            ],
            [
                'waterlevel' => '2',
                'phlevel' => '12',
                'templevel' => '30',
                'blevel' => '1',
                'created_at' => '2021-04-21 03:23:16'
            ],
            [
                'waterlevel' => '2',
                'phlevel' => '12',
                'templevel' => '30',
                'blevel' => '1',
                'created_at' => '2021-04-21 03:23:16'
            ],
            [
                'waterlevel' => '2',
                'phlevel' => '12',
                'templevel' => '30',
                'blevel' => '1',
                'created_at' => '2021-04-21 03:23:16'
            ],
            [
                'waterlevel' => '2',
                'phlevel' => '12',
                'templevel' => '30',
                'blevel' => '1',
                'created_at' => '2021-04-21 03:23:16'
            ],
            [
                'waterlevel' => '2',
                'phlevel' => '12',
                'templevel' => '30',
                'blevel' => '1',
                'created_at' => '2021-04-21 03:23:16'
            ],
            [
                'waterlevel' => '2',
                'phlevel' => '12',
                'templevel' => '30',
                'blevel' => '1',
                'created_at' => '2021-04-21 03:23:16'
            ],
            [
                'waterlevel' => '2',
                'phlevel' => '12',
                'templevel' => '30',
                'blevel' => '1',
                'created_at' => '2021-04-21 03:23:16'
            ],
            [
                'waterlevel' => '2',
                'phlevel' => '12',
                'templevel' => '30',
                'blevel' => '1',
                'created_at' => '2021-04-21 03:23:16'
            ],
        ]);
    }
}
