<?php

namespace Database\Seeders;

use App\Models\TimeOffType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class TimeOffTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TimeOffType::upsert([
            ['id'=> Str::uuid()->toString(),'name'=>'Training'],
            ['id'=> Str::uuid()->toString(),'name'=>'Tea Break'],
            ['id'=> Str::uuid()->toString(),'name'=>'Lunch Break'],
            ['id'=> Str::uuid()->toString(),'name'=>'Bio Break'],
            ['id'=> Str::uuid()->toString(),'name'=>'End of Day'],
            // ['name'=>''],
            // ['name'=>''],
        ],['id'],['name']);
    }
}
