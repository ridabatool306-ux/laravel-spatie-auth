<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin User
    $admin = User::create([
        'name' => 'Admin',
        'email' => 'admin@gmail.com',
        'password' => Hash::make('12345678'),
    ]);

    $admin->assignRole('admin');

    // Normal User
    $user = User::create([
        'name' => 'User',
        'email' => 'user@gmail.com',
        'password' => Hash::make('12345678'),
    ]);

    $user->assignRole('viewer');
    }
}
