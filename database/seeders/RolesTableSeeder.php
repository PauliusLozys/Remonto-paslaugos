<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Role::truncate();  
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');   
        Role::create(['name' => 'manager']);
        Role::create(['name' => 'unregistered']);
        Role::create(['name' => 'recipient']);
        Role::create(['name' => 'repairman']);
    }
}
