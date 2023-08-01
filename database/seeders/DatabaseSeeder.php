<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'gender'=>'Male',
            'field_of_work_interests'=> '["Programming", "Designing", "Marketing"]',
            'linkedin_username'=>'user',
            'mobile_number'=>'12345678910',
            'location' => 'jalan-jalan',
            'photo'=>'bear.png',
            'password' => Hash::make('password') //password
        ]);

        User::create([
            'gender'=>'Female',
            'field_of_work_interests'=> '["Programming", "Designing", "Marketing"]',
            'linkedin_username'=>'user2',
            'mobile_number'=>'324324324',
            'location' => 'jalan-jalan',
            'photo'=>'bear.png',
            'password' => Hash::make('password') //password
        ]);

        User::create([
            'gender'=>'Male',
            'field_of_work_interests'=> '["Programming", "Designing", "Marketing"]',
            'linkedin_username'=>'user3',
            'mobile_number'=>'343234343',
            'location' => 'jalan-jalan3',
            'photo'=>'bear.png',
            'password' => Hash::make('password') //password
        ]);

        User::create([
            'gender'=>'Female',
            'field_of_work_interests'=> '["Programming", "Designing", "Marketing"]',
            'linkedin_username'=>'user4',
            'mobile_number'=>'65432345',
            'location' => 'jalan-jalan4',
            'photo'=>'bear.png',
            'password' => Hash::make('password') //password
        ]);
    }
}
