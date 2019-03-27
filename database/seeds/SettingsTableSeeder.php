<?php

use Illuminate\Database\Seeder;
use App\Setting;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Setting::create([
            'site_name' => 'UST COUNSELING AND CAREER CENTER',
            'address' => 'Counseling and Career Center Annex, 1st floor
                            Quadricentennial Pavilion
                            UST España, 1008 Manila, Philippines',
            'contact_number' => '4061611 local 8777 & 7811473',
            'contact_email' => 'ccc.careerservices@ust.edu.ph',
        ]);
    }
}