<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin2 User',
            'email' => 'admin2@gmail.com',
            'password' => 123,
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'guest2 User',
            'email' => 'user2@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);
    }
}
