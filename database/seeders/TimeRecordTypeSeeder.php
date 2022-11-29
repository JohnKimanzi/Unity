<?php

namespace Database\Seeders;

use App\Models\TimeRecordType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TimeRecordTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TimeRecordType::upsert([
            ['id'=> Str::uuid()->toString(),'name'=>'Clock In/Out'],
            ['id'=> Str::uuid()->toString(),'name'=>'First Break'],
            ['id'=> Str::uuid()->toString(),'name'=>'Lunch Break'],
            ['id'=> Str::uuid()->toString(),'name'=>'Second Break'],
            ['id'=> Str::uuid()->toString(),'name'=>'Custom Break'],
        ],['id'],['name']);
    }
}
