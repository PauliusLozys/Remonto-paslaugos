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
//        User::truncate();
//        DB::table('role_user')->truncate();

        $managerRole = Role::where('name', 'manager')-> first()->id;
        $clientRole = Role::where('name', 'client')-> first()->id;
        $recipientRole = Role::where('name', 'recipient')-> first()->id;
        $repairmanRole = Role::where('name', 'repairman')-> first()->id;


        $manager = User::create([
            'name' => 'Manager user',
            'email' => 'manager@manager.com',
            'password' => Hash::make('password'),
            'role_id' => $managerRole
        ]);

        $client = User::create([
            'name' => 'Client user',
            'email' => 'client@client.com',
            'password' => Hash::make('password'),
            'role_id' => $clientRole
        ]);

        $recipient = User::create([
            'name' => 'Recipient user',
            'email' => 'recipient@recipient.com',
            'password' => Hash::make('password'),
            'role_id' => $recipientRole
        ]);

        $repairman = User::create([
            'name' => 'Repairman user',
            'email' => 'repairman@repairman.com',
            'password' => Hash::make('password'),
            'role_id' => $repairmanRole
        ]);
    }
}
