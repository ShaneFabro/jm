<?php

use Illuminate\Database\Seeder;
use App\College;

class CollegesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\College::create([
            'college_name' => 'Medicine and Health Allied Sciences',
        ]);
        App\College::create([
            'college_name' => 'Science and Technology',
        ]);
        App\College::create([
            'college_name' => 'Accountancy, Business, and Management',
        ]);
        App\College::create([
            'college_name' => 'Humanities and Social Sciences',
        ]);
        App\College::create([
            'college_name' => 'Music, Arts, and Design',
        ]);
        App\College::create([
            'college_name' => 'Physical Education and sports',
        ]);
       
    }
}