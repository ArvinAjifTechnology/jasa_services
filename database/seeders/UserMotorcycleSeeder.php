<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserMotorcycleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userMotorcycles = [
            [
                'user_id' => 2,
                'motorcycle_brand' => 'Honda',
                'motorcycle_model' => 'CBR 1000RR',
                'manufacturing_year' => 2020,
                'license_plate' => 'AB 1234 CD',
            ],
            // Add more data as needed
        ];

        DB::table('user_motorcycles')->insert($userMotorcycles);
    }
}
