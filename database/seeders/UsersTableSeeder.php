<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        User::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $managerRole = Role::where('name', 'manager')-> first()->id;
        $unregisteredRole = Role::where('name', 'unregistered')-> first()->id;
        $recipientRole = Role::where('name', 'recipient')-> first()->id;
        $repairmanRole = Role::where('name', 'repairman')-> first()->id;


        User::create([
            'name' => 'Manager user',
            'email' => 'manager@manager.com',
            'password' => Hash::make('password'),
            'role_id' => $managerRole
        ]);

        User::create([
            'name' => 'Naudotojas user',
            'email' => 'naud@naud.com',
            'password' => Hash::make('password'),
            'role_id' => $unregisteredRole
        ]);

        User::create([
            'name' => 'Recipient user',
            'email' => 'recipient@recipient.com',
            'password' => Hash::make('password'),
            'role_id' => $recipientRole
        ]);

        User::create([
            'name' => 'Repairman user',
            'email' => 'repairman@repairman.com',
            'password' => Hash::make('password'),
            'role_id' => $repairmanRole
        ]);

        User::create([
            'name' => 'Repairman 2 user',
            'email' => 'repairman2@repairman.com',
            'password' => Hash::make('password'),
            'role_id' => $repairmanRole
        ]);
    }
}
