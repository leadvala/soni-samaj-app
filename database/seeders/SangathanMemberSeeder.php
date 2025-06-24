<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SangathanMember;
use App\Models\City;


class SangathanMemberSeeder extends Seeder
{
    public function run(): void
    {
        $city = City::first(); // Use the first city or modify as needed

        $names = [
            'Sita Devi', 'Radha Kumari', 'Meena Patel', 'Sunita Sharma', 'Anita Yadav',
            'Pooja Verma', 'Kavita Singh', 'Geeta Rani', 'Neelam Joshi', 'Lata Desai',
            'Rani Chauhan', 'Savita Devi', 'Kamla Bai', 'Rukmini Pandey', 'Anjali Jain',
            'Nisha Kumari', 'Jyoti Dubey', 'Preeti Sharma', 'Rekha Bano', 'Shabana Khan'
        ];

        $roles = [
            'President', 'Vice President', 'Secretary', 'Treasurer', 'Coordinator',
            'Member', 'Senior Member', 'Advisor', 'Organizer', 'Volunteer'
        ];

        $sectors = ['महिला', 'कार्यकारिणी', 'युवा', 'वरिष्ठ नागरिक', 'शिक्षा'];

        foreach ($names as $index => $name) {
            SangathanMember::create([
                'name' => $name,
                'role_title' => $roles[$index % count($roles)],
                'sector' => $sectors[$index % count($sectors)],
                'mobile' => '98' . rand(10000000, 99999999),
                'photo_path' => null,
                'city_id' => $city->id,
            ]);
        }
    }
}
