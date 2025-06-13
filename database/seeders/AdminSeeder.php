<?php

namespace Database\Seeders; // ✅ Add this line

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminSeeder extends Seeder {
    public function run(): void {
        Admin::create([
            'email' => 'admin@samaj.com',
            'password' => Hash::make('admin123'), // change in production
        ]);
    }
}
