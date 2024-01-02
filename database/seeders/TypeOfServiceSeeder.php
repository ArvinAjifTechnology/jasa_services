<?php

namespace Database\Seeders;

use App\Models\TypeOfService;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class TypeOfServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TypeOfService::create([
            'type_of_service' => 'Full Service',
            'description' => 'Dianjurkan apabila motor sudah mencapai 10.000km atau lebih',
            'price' => 250000,
            'image' => 'images/full_service.png', 
        ]);
        TypeOfService::create([
            'type_of_service' => 'Service CTV',
            'description' => 'Dianjurkan apabila akselerasi motor sudah tidak nyaman',
            'price' => 50000,
            'image' => 'images/service_ctv.png', 
        ]);
        TypeOfService::create([
            'type_of_service' => 'Ganti Oli',
            'description' => 'Dianjurkan apabila motor sudah mencapai 1.000km',
            'price' => 45000,
            'image' => 'images/ganti_oli.png', 
        ]);
    }
}
