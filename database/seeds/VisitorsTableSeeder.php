<?php

use Illuminate\Database\Seeder;

class VisitorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker\Factory::create();

        for ($i = 1; $i < 100; $i++) {
            App\Visitor::create([
                'ip'       => $faker->ipv4,
                'stand_id' => $faker->numberBetween(1, 20)
            ]);
        }
    }
}
