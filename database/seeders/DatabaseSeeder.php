<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\ItemMaster;
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
        $roles = ['super_admin', 'admin', 'user'];

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

        $usersData = $this->getUsersData();
        $role = Role::where('name', 'admin')->first();
        foreach ($usersData as $userData) {
            $user = User::create($userData);
            $user->roles()->attach($role);
        }

        $itemsData = $this->getItemsData();
        foreach ($itemsData as $itemData) {
            $item = ItemMaster::create($itemData);
        }
    }

    private function getUsersData()
    {
        return [
            [
                'first_name' => 'john',
                'last_name' => 'smith',
                'date_of_birth' => '2015-09-12',
                'mobile_number' => '9090909090',
                'pincode' => '400063',
                'state' => 'mumbai',
                'city' => 'taravi',
                'address' => 'mumbai',
                'user_name' => 'John345',
                'email' => 'john@example.com',
                'password' => Hash::make('password'),
            ],
            [
                'first_name' => 'sam',
                'last_name' => 'sung',
                'date_of_birth' => '2012-01-02',
                'mobile_number' => '9675678764',
                'pincode' => '400063',
                'state' => 'mumbai',
                'city' => 'taravi',
                'address' => 'mumbai',
                'user_name' => 'Samsung132',
                'email' => 'sam@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'first_name' => 'June',
                'last_name' => 'Adam',
                'date_of_birth' => '2005-09-12',
                'mobile_number' => '8767767877',
                'pincode' => '400063',
                'state' => 'mumbai',
                'city' => 'taravi',
                'address' => 'mumbai',
                'user_name' => 'June109',
                'email' => 'june@example.com',
                'password' => Hash::make('password'),
            ],
            [
                'first_name' => 'April',
                'last_name' => 'black',
                'date_of_birth' => '1995-06-12',
                'mobile_number' => '9768767878',
                'pincode' => '400063',
                'state' => 'mumbai',
                'city' => 'taravi',
                'address' => 'mumbai',
                'user_name' => 'April345',
                'email' => 'april@example.com',
                'password' => Hash::make('password'),
            ],
            [
                'first_name' => 'Hari',
                'last_name' => 'potter',
                'date_of_birth' => '1999-03-12',
                'mobile_number' => '7689878900',
                'pincode' => '400063',
                'state' => 'mumbai',
                'city' => 'taravi',
                'address' => 'mumbai',
                'user_name' => 'haripotter007',
                'email' => 'hari@example.com',
                'password' => Hash::make('password'),
            ],
        ];
    }

    private function getItemsData()
    {
        return [
            [
                'name' => 'dolo',
                'description' => 'paracitamal',
                'price' => 5,
                'quantity' => 20,
            ],
            [
                'name' => 'Pen',
                'description' => 'smoothly writing',
                'price' => 45,
                'quantity' => 120,
            ],
            [
                'name' => 'Notebook',
                'description' => 'hero notebooks',
                'price' => 35,
                'quantity' => 9,
            ],
            [
                'name' => 'Stapler',
                'description' => '',
                'price' => 405,
                'quantity' => 30,
            ],
            [
                'name' => 'Paperclip',
                'description' => '',
                'price' => 59,
                'quantity' => 120,
            ],
            [
                'name' => 'Calculator',
                'description' => '',
                'price' => 95,
                'quantity' => 80,
            ],
            [
                'name' => 'Charger',
                'description' => '',
                'price' => 235,
                'quantity' => 20,
            ],
            [
                'name' => 'Mouse',
                'description' => '',
                'price' => 85,
                'quantity' => 2,
            ],
            [
                'name' => 'Crayons',
                'description' => '',
                'price' => 25,
                'quantity' => 4,
            ],
            [
                'name' => 'Scissors',
                'description' => '',
                'price' => 35,
                'quantity' => 5,
            ],
            [
                'name' => 'Binder',
                'description' => '',
                'price' => 55,
                'quantity' => 8,
            ],
        ];
    }
}
