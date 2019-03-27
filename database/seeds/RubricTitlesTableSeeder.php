<?php

use Illuminate\Database\Seeder;
use App\RubricTitle;

class RubricTitlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\RubricTitle::create([
            'name' => 'Contact Information',
        ]);
        App\RubricTitle::create([
            'name' => 'Education',
        ]);
        App\RubricTitle::create([
            'name' => 'Experience',
        ]);
        App\RubricTitle::create([
            'name' => 'Involvement',
        ]);
        App\RubricTitle::create([
            'name' => 'Visual Appeal',
        ]);
        App\RubricTitle::create([
            'name' => 'Organization of Content',
        ]);
        App\RubricTitle::create([
            'name' => 'Grammar, Spelling, and Punctuation',
        ]);
    }
}
