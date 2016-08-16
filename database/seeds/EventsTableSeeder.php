<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        App\Event::create([
            'name'        => $faker->name,
            'description' => $faker->paragraph,
            'address'     => $faker->paragraph,
            'date_begin'  => Carbon::createFromDate(2016, 8, 1),
            'date_end'    => Carbon::createFromDate(2016, 8, 10),
            'lat'         => '31.80289',
            'long'        => '-98.87695',
        ]);

        App\Event::create([
            'name'        => $faker->name,
            'description' => $faker->paragraph,
            'address'     => $faker->paragraph,
            'date_begin'  => Carbon::createFromDate(2016, 8, 5),
            'date_end'    => Carbon::createFromDate(2016, 8, 12),
            'lat'         => '40.97990',
            'long'        => '-75.23438',
        ]);

        App\Event::create([
            'name'        => $faker->name,
            'description' => $faker->paragraph,
            'address'     => $faker->paragraph,
            'date_begin'  => Carbon::createFromDate(2016, 8, 15),
            'date_end'    => Carbon::createFromDate(2016, 8, 20),
            'lat'         => '34.30714',
            'long'        => '-118.12500',
        ]);

        App\Event::create([
            'name'        => $faker->name,
            'description' => $faker->paragraph,
            'address'     => $faker->paragraph,
            'date_begin'  => Carbon::createFromDate(2016, 8, 21),
            'date_end'    => Carbon::createFromDate(2016, 8, 23),
            'lat'         => '35.53223',
            'long'        => '-77.60742',
        ]);
    }
}
