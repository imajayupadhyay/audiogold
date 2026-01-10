<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::create([
            'name' => 'ajayupadhyay',
            'email' => 'ajayupadhyaydevops@gmail.com',
            'password' => \Illuminate\Support\Facades\Hash::make('Ajay@123#'),
            'email_verified_at' => now(),
        ]);
    }
}
