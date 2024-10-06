<?php

namespace Database\Seeders;

use App\Models\Room;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('zidan227'),
            'role' => 'مسؤول نظام',
        ]);

        User::create([
            'name' => 'teacher',
            'email' => 'teacher@gmail.com',
            'password' => Hash::make('zidan227'),
            'role' => 'عضو هيئة تدريس',
        ]);

        User::create([
            'name' => 'student',
            'email' => 'student@gmail.com',
            'password' => Hash::make('zidan227'),
            'role' => 'طالب',
        ]);

        for ($i = 1; $i < 100; $i ++) {
            Room::create([
                'name' => "CS Room $i",
                'description' => 'normal room',
                'capacity' => 25,
                'available' => true,
                'type' => 'معمل حاسوب',
                'image' => '1727779007.png',
            ]);

            Room::create([
                'name' => "MATH Room $i",
                'description' => 'normal room',
                'capacity' => 25,
                'available' => true,
                'type' => 'فصل',
                'image' => '1727779007.png',
            ]);

            Room::create([
                'name' => "BIG Room $i",
                'description' => 'normal room',
                'capacity' => 25,
                'available' => true,
                'type' => 'مدرج',
                'image' => '1727779007.png',
            ]);
        }
    }
}
