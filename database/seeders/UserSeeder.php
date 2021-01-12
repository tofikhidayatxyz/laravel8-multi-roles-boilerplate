<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleAdmin = Role::where('name', 'admin')->first();
        $roleUser = Role::where('name', 'user')->first();
    
        // creating admin
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@test.app',
            'password' => Hash::make('secret')
        ]);
        $admin->roles()->attach($roleAdmin);
        
        // creating user
        $user = User::create([
            'name' => 'User',
            'email' => 'user@test.app',
            'password' => Hash::make('secret')
        ]);
        $user->roles()->attach($roleUser);
    }
}
