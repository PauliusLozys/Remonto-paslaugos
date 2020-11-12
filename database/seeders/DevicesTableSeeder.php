<?php

namespace Database\Seeders;

use App\Models\Device;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DevicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Device::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        Device::create([
            'is_repaired' => false,
            'is_withdrawn' => false,
            'public_access' => substr(Hash::make(rand()), 7, 6)
        ]);

        Device::create([
            'is_repaired' => true,
            'is_withdrawn' => false,
            'repairman_id' => 4,
            'public_access' => substr(Hash::make(rand()), 7, 6)
        ]);

        Device::create([
            'is_repaired' => true,
            'is_withdrawn' => true,
            'repairman_id' => 5,
            'public_access' => substr(Hash::make(rand()), 7, 6)
        ]);


    }
}
