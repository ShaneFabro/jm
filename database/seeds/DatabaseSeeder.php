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
        $this->call(UsersTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(RatingsTableSeeder::class);
        $this->call(RubricTitlesTableSeeder::class);
        $this->call(RubricCategoriesTableSeeder::class);
        $this->call(CollegesTableSeeder::class);
        $this->call(CoursesTableSeeder::class);
    }
}
