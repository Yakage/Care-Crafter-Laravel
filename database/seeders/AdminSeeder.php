<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void{
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'age' => 20,
            'height' => '177.3',
            'weight' => '69',
            'gender' => 'male',
            'password' => Hash::make('12345678'),
            'role' => 'admin',
            'status' => 'active',
        ]);
    }
}
