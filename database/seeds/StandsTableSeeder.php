<?php

use Illuminate\Database\Seeder;

class StandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker\Factory::create();

        for ($i = 0; $i < 4; $i++) {
            for ($j = (($i * 5) + 1); $j <= (($i + 1) * 5); $j++) {
                App\Stand::create([
                    'image_url'  => $faker->imageUrl(32, 32),
                    'event_id'   => $i + 1,
                    'price'      => $faker->randomNumber(),
                    'company_id' => $j
                ]);
            }
        }

        for ($i = 0; $i < 4; $i++) {
            App\Stand::create([
                'image_url'  => $faker->imageUrl(32, 32),
                'event_id'   => $i + 1,
                'price'      => $faker->numberBetween(100, 9000),
                'company_id' => null
            ]);
        }
    }
}
