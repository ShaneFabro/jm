<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'role_id' => '2',
            'is_active' => '1',
            'first_name' => 'tester',
            'last_name' => 'tester',
            'email' =>  'admin2@test.com',
            'password' => bcrypt('123123'),
        ]);
        App\User::create([
            'role_id' => '1',
            'is_active' => '1',
            'first_name' => 'tester',
            'last_name' => 'tester',
            'email' =>  'admin@test.com',
            'password' => bcrypt('123123'),
        ]);
    }
}
