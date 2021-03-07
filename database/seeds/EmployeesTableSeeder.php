<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('employees')->insert([
                [
            		'firstname' => 'Mitzi Joy',
                    'middlename' => 'S',
                    'lastname' => 'Carcallas',
                    'gender_id' => '2',
                    'age' => '25',
                    'birthday' => '1996-02-01',
                    'contact_number' => '09261123227',
                    'status_id' => '1',
                    'address' => 'General Santos City',
                    'profile' => 'images/employee/190221_05_41_22.jpg'
                ],
                [
                    'firstname' => 'Mitzi Rose',
                    'middlename' => 'M',
                    'lastname' => 'Carcallas',
                    'gender_id' => '2',
                    'age' => '25',
                    'birthday' => '1996-04-01',
                    'contact_number' => '09261123227',
                    'status_id' => '1',
                    'address' => 'General Santos City',
                    'profile' => 'images/employee/190221_05_41_22.jpg'
                ],
                [
                    'firstname' => 'Rose Mitzi',
                    'middlename' => 'C',
                    'lastname' => 'Carcallas',
                    'gender_id' => '2',
                    'age' => '25',
                    'birthday' => '1996-04-01',
                    'contact_number' => '09261123227',
                    'status_id' => '1',
                    'address' => 'General Santos City',
                    'profile' => 'images/employee/190221_05_41_22.jpg'
                ],
        	]);
    }
}
