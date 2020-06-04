<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();

        $adminRole = Role::where('name', 'admin')->first();
        $workerRole = Role::where('name', 'worker')->first();
        $userRole = Role::where('name', 'user')->first();

        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'password' => Hash::make('123456789')
        ]);
        $worker = User::create([
            'name' => 'Worker User',
            'email' => 'worker@worker.com',
            'password' => Hash::make('123456789')
        ]);
        $user = User::create([
            'name' => ' Generic User',
            'email' => 'user@user.com',
            'password' => Hash::make('123456789')
        ]);

        $admin->roles()->attach($adminRole);
        $worker->roles()->attach($workerRole);
        $user->roles()->attach($userRole);
    }
}
