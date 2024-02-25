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
            'birthday' => '2004-01-02',
            'gender' => 'male',
            'height' => '177.3',
            'weight' => '69',
            'password' => Hash::make('12345678'),
            'role' => 'admin',
            'status' => 'online',
        ]);
    }
}
