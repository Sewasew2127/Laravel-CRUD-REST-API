<?php

use App\Models\employe;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
namespace Database\Factories;

//use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = employe::class;
    public function definition()
    {
        return [
             'name' => $this->$faker->name,
             'DoB' => $this->$faker->date,
             'gender' => $this->$faker->text,
             'salary' => $this->$faker->salary,
        ];
    }
}
