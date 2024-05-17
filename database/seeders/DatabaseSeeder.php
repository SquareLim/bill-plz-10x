<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $userData =[
            [
                'name' => 'Admin',
                'email' => 'FiveDown2024@outlook.com',
                'gender' => 'F',
                'dob' => '1990-01-01',
                'tel' => '123421342341342',
                'user_type' => 'ADMIN',
                'initial' => 'ADM',
                'status' => 'ACTIVE',
                'profile_picture_path' => 'https://example.com/profile.jpg',
                'updated_at' => null,
                'password' => Hash::make('password123'),
            ],
            [
                'name' => 'Zhen',
                'email' => 'FZLim24@outlook.com',
                'gender' => 'F',
                'dob' => '1990-01-01',
                'tel' => '123412342343245678654',
                'user_type' => 'MANAGER',
                'initial' => 'FZL',
                'status' => 'ACTIVE',
                'profile_picture_path' => 'https://example.com/profile.jpg',
                'updated_at' => null,
                'password' => Hash::make('password123'),
            ],
            [
                'name' => 'Amalesh',
                'email' => 'scrumam@outlook.com',
                'gender' => 'F',
                'dob' => '1990-01-01',
                'tel' => '1234561231234890',
                'user_type' => 'SALEMAN',
                'initial' => 'AMA',
                'status' => 'ACTIVE',
                'profile_picture_path' => 'https://example.com/profile.jpg',
                'updated_at' => null,
                'password' => Hash::make('password123'),
            ],
            [
                'name' => 'Luk Hing',
                'email' => 'aprilmarch2024@outlook.com',
                'gender' => 'F',
                'dob' => '1990-01-01',
                'tel' => '1234567890',
                'user_type' => 'SALEMAN',
                'initial' => 'LHK',
                'status' => 'ACTIVE',
                'profile_picture_path' => 'https://example.com/profile.jpg',
                'updated_at' => null,
                'password' => Hash::make('password123'),
            ],
            [
                'name' => 'Chendershen',
                'email' => 'scrummaximize2024@outlook.com',
                'gender' => 'F',
                'dob' => '1990-01-01',
                'tel' => '12312784567890',
                'user_type' => 'SALEMAN',
                'initial' => 'CDS',
                'status' => 'ACTIVE',
                'profile_picture_path' => 'https://example.com/profile.jpg',
                'updated_at' => null,
                'password' => Hash::make('password123'),
            ],
            [
                'name' => 'Kumar Elon',
                'email' => 'kumarasastudent@outlook.com',
                'gender' => 'F',
                'dob' => '1990-01-01',
                'tel' => '0124567890',
                'user_type' => 'PURCHASER',
                'initial' => 'KEL',
                'status' => 'ACTIVE',
                'profile_picture_path' => 'https://example.com/profile.jpg',
                'updated_at' => null,
                'password' => Hash::make('password123'),
            ]
            ];
            foreach ($userData as $user) {
                User::create($user);
            }
    }
}
