<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $roles = ['super_admin', 'admin','user'];

        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }

        $user =  User::create([
            'first_name' => 'Tara',
            'user_name' => 'Tara007',
            'mobile_number' => '8973873735',
            'email' => 'tara@gmail.com',
            'password' => Hash::make('password'),
        ]);
        $role = Role::where('name', 'super_admin')->first();
        $user->roles()->attach($role);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
