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
        $array = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin786'),
            ],
            [
                'name' => 'Bilal',
                'email' => 'bilal@gmail.com',
                'password' => Hash::make('admin786'),
            ]
        ];

        \DB::table('users')->insert($array);
    }
}
