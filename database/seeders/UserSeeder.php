<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('password'),
            ]
        );

        User::firstOrCreate(
            ['email' => 'bilal@gmail.com'],
            [
                'name' => 'Bilal',
                'password' => Hash::make('password'),
            ]
        );
    }
}