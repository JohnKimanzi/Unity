<?php

namespace Database\Seeders;

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
        // \App\Models\Lead::factory(5)->create();
        // $this->call(TimeOffTypesSeeder::class);
        // $this->call(DepartmentsSeeder::class);
        // $this->call(CountriesSeeder::class);
        // $this->call(DesignationsSeeder::class);
        // $this->call(PtoTypesSeeder::class);
        $this->call(TimeRecordTypeSeeder::class);
    }
}
