<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create default admin user
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@hmail.com',
            'password' => Hash::make('password123'),
        ]);

        // Create a test user
        User::create([
            'name' => 'Test User',
            'email' => 'test@hmail.com',
            'password' => Hash::make('password123'),
        ]);
    }
}

