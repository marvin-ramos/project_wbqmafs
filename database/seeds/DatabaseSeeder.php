<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
        	RolesTableSeeder::class,
        	UsersTableSeeder::class,
            EmployeesTableSeeder::class,
            GendersTableSeeder::class,
            StatusesTableSeeder::class,
            LogsTableSeeder::class,
            WatersTableSeeder::class,
            TurbiditiesTableSeeder::class,
            TemperaturesTableSeeder::class,
            Ph_LevelsTableSeeder::class
        ]);
    }
}
