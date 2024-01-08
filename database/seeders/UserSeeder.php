<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
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
        $user = User::create([
            'name' => 'John',
            'email' => 'john@example.com',
            'password' => Hash::make('123123'),
        ]);
        $user->roles()->attach([1, 3]);

        $user2 = User::create([
            'name' => 'Mark',
            'email' => 'mark@example.com',
            'password' => Hash::make('123123'),
        ]);
        $user2->roles()->attach([2]);
    }
}
