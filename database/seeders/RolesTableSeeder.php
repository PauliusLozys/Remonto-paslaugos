<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Role::truncate();
        
        Role::create(['name' => 'manager']);
        Role::create(['name' => 'client']);
        Role::create(['name' => 'recipient']);
        Role::create(['name' => 'repairman']);
    }
}
