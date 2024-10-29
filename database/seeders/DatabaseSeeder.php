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
            'password' => Hash::make('admin'),
            'role' => 'مسؤول نظام',
        ]);

        User::create([
            'name' => 'teacher',
            'email' => 'teacher@gmail.com',
            'password' => Hash::make('teacher'),
            'role' => 'عضو هيئة تدريس',
        ]);

        User::create([
            'name' => 'student',
            'email' => 'student@gmail.com',
            'password' => Hash::make('student'),
            'role' => 'طالب',
        ]);

        for ($i = 1; $i < 4; $i ++) {
            Room::create([
                'name' => "CS Room $i",
                'description' => 'normal room',
                'capacity' => 25,
                'available' => false,
                'type' => 'معمل حاسوب',
                'image' => 'room.jpg',
            ]);

            Room::create([
                'name' => "MATH Room $i",
                'description' => 'normal room',
                'capacity' => 25,
                'available' => false,
                'type' => 'فصل',
                'image' => 'room.jpg',
            ]);

            Room::create([
                'name' => "BIG Room $i",
                'description' => 'normal room',
                'capacity' => 25,
                'available' => false,
                'type' => 'مدرج',
                'image' => 'room.jpg',
            ]);
        }

        for ($i = 1; $i < 15; $i ++) {
            Room::create([
                'name' => "CS Room $i",
                'description' => 'normal room',
                'capacity' => 25,
                'available' => true,
                'type' => 'معمل حاسوب',
                'image' => 'room.jpg',
            ]);

            Room::create([
                'name' => "MATH Room $i",
                'description' => 'normal room',
                'capacity' => 25,
                'available' => true,
                'type' => 'فصل',
                'image' => 'room.jpg',
            ]);

            Room::create([
                'name' => "BIG Room $i",
                'description' => 'normal room',
                'capacity' => 25,
                'available' => true,
                'type' => 'مدرج',
                'image' => 'room.jpg',
            ]);
        }
    }
}
