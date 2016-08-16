<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tables = array(
            'users',
            'companies',
            'stands',
            'events',
            'visitors',
            'api_keys'
        );

        if (!App::runningUnitTests()) {
            DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        }

        foreach ($tables as $table) {
            DB::table($table)->truncate();
        }

        $this->call(UsersTableSeeder::class);
        $this->call(EventsTableSeeder::class);
        $this->call(CompaniesTableSeeder::class);
        $this->call(StandsTableSeeder::class);
        $this->call(VisitorsTableSeeder::class);

        if (!App::runningUnitTests()) {
            DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        }
    }
}
