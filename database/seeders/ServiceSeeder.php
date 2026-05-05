<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Service::create([
            'title' => 'Consultance',
            'description' => 'Conception et élaboration de business plan / projets',
            'icon' => 'fas fa-briefcase',
            'image' => 'service_consultancy_1777880192626.png'
        ]);

        \App\Models\Service::create([
            'title' => 'Auto-école',
            'description' => 'Moto et véhicule VIP',
            'icon' => 'fas fa-car',
            'image' => 'service_driving_school_1777880208642.png'
        ]);

        \App\Models\Service::create([
            'title' => 'Location de véhicules',
            'description' => 'Mariage et voyage',
            'icon' => 'fas fa-shuttle-van',
            'image' => 'service_car_rental_1777880354314.png'
        ]);

        \App\Models\Service::create([
            'title' => 'Maisons de location',
            'description' => 'Maisons confortables et sécurisées',
            'icon' => 'fas fa-home',
            'image' => 'service_house_rental_v2_1777881422225.png'
        ]);
    }
}
