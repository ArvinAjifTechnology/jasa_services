<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'username' => 'admin',
            'user_code' => 'ADM' . Str::random(6),
            'email' => '2106100@itg.ac.id',
            'first_name' => 'Arvin Muhammad',
            'last_name' => 'Ajif',
            'role' => 'admin',
            'gender' => 'male',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'username' => 'user',
            'user_code' => 'USR' . Str::random(6),
            'email' => '2106049@itg.ac.id',
            'first_name' => 'Mita Tri',
            'last_name' => 'Andari',
            'role' => 'user',
            'gender' => 'female',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'username' => 'mechanic',
            'user_code' => 'BWR' . Str::random(6),
            'email' => '2106040@itg.ac.id',
            'first_name' => 'David',
            'last_name' => 'Johnson',
            'role' => 'mechanic',
            'gender' => 'male',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);
    }
}
