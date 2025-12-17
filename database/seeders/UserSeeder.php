<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'Admin',
            'email' => 'admin@cms.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Create author user
        User::create([
            'name' => 'Author',
            'email' => 'author@cms.com',
            'password' => Hash::make('password'),
            'role' => 'author',
        ]);

        // Create reviewer user
        User::create([
            'name' => 'Reviewer',
            'email' => 'reviewer@cms.com',
            'password' => Hash::make('password'),
            'role' => 'reviewer',
        ]);
    }
}
