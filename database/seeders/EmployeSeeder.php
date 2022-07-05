<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\employe;



class EmployeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Abebe Bekel', 'DoB' => '1993-08-11', 'gender' => 'Male', 'salary' => '2000'],
             ['name' => 'Emama Alemu', 'DoB' => '1986-08-11', 'gender' => 'Male', 'salary' => '2000'],
             ['name' => 'Ato Ato', 'DoB' => '1987-08-11', 'gender' => 'Male', 'salary' => '2000'],
             ['name' => 'some name', 'DoB' => '1989-08-11', 'gender' => 'Male', 'salary' => '2000'],
        ];
        foreach ($data as $key => $value) {
            employe::create($value);
        }
    }
}
