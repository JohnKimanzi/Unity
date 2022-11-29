<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TeamsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Team::upsert([
            ['id'=> Str::uuid()->toString(),'name'=>'Collections'],
            ['id'=> Str::uuid()->toString(),'name'=>'Administration'],
            ['id'=> Str::uuid()->toString(),'name'=>'Business development'],
            ['id'=> Str::uuid()->toString(),'name'=>'Finance'],
            ['id'=> Str::uuid()->toString(),'name'=>'Legal'],
            // ['name'=>''],
            // ['name'=>''],
        ],['id'],['name']);
    }
}
