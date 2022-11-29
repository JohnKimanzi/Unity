<?php

namespace Database\Seeders;

use App\Models\Designation;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DesignationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Designation::upsert([
            ['id'=> Str::uuid()->toString(),'name'=>'Collector'],
            ['id'=> Str::uuid()->toString(),'name'=>'Administrator'],
            ['id'=> Str::uuid()->toString(),'name'=>'Sales rep'],
            ['id'=> Str::uuid()->toString(),'name'=>'Finance officer'],
            ['id'=> Str::uuid()->toString(),'name'=>'Legal officer'],
            // ['name'=>''],
            // ['name'=>''],
        ],['id'],['name']);
    }
}
