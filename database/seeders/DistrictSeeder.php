<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\District;
use App\Models\City;

class DistrictSeeder extends Seeder
{
    public function run(): void
    {
        // Creating districts with correct 'image_path' column
        $udaipur = District::create([
            'name' => 'Udaipur',
            'image_path' => null // change from 'image' to 'image_path'
        ]);

        $rajsamand = District::create([
            'name' => 'Rajsamand',
            'image_path' => null // change from 'image' to 'image_path'
        ]);

        // Creating cities under each district
        City::create(['name' => 'City A', 'district_id' => $udaipur->id]);
        City::create(['name' => 'City B', 'district_id' => $udaipur->id]);
        City::create(['name' => 'City C', 'district_id' => $rajsamand->id]);
    }
}
