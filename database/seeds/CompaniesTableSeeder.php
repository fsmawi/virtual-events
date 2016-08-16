<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\URL;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 0; $i < 20; $i++) {
            App\Company::create([
                'name'               => $faker->name,
                'phone'              => $faker->e164PhoneNumber,
                'address'            => $faker->paragraph,
                'description'        => $faker->paragraph,
                'logo_url'           => $faker->imageUrl(150, 150),
                'admin_full_name'    => $faker->name,
                'admin_email'        => $faker->email,
                'marketing_document' => URL::to('/').'/files/documents/company_' . ($i + 1) . '.doc'
            ]);

            File::put('public/files/documents/company_' . ($i + 1) . '.doc', 'John Doe');
        }
    }
}
