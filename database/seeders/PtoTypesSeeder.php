<?php

namespace Database\Seeders;

use App\Models\PtoType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PtoTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PtoType::upsert([
            ['id'=> Str::uuid()->toString(),'name'=>'Sick Leave','max_hours'=>200, 'max_roll_over'=>0, 'status'=>1],
            ['id'=> Str::uuid()->toString(),'name'=>'Medical Leave','max_hours'=>200, 'max_roll_over'=>0, 'status'=>1],
            ['id'=> Str::uuid()->toString(),'name'=>'Vacation','max_hours'=>200, 'max_roll_over'=>0, 'status'=>1],
            ['id'=> Str::uuid()->toString(),'name'=>'Over Time','max_hours'=>200, 'max_roll_over'=>0, 'status'=>1],
            
        ],['id'],['name', 'max_hours', 'max_roll_over']);
    }
}
