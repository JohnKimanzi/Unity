<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DepartmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::upsert([
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
