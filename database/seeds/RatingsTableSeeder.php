<?php

use Illuminate\Database\Seeder;
use App\Rating;

class RatingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Rating::create([
            'name' => 'Tiger Ready',
        ]);
        App\Rating::create([
            'name' => 'Almost Ready',
        ]);
        App\Rating::create([
            'name' => 'Needs Improvement',
        ]);
    }
}
