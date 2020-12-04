<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gender;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Create genders
        Gender::create(['name' => 'Masculino']);
        Gender::create(['name' => 'Femenino']);
        Gender::create(['name' => 'Otros']);
    }
}
