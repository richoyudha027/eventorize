<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name'=>'admin1',
                'email'=>'admin1@gmail.com',
                'role'=>'admin',
                'password'=>bcrypt('admin123456'),
            ],
            [
                'name'=>'user1',
                'email'=>'user1@gmail.com',
                'role'=>'user',
                'password'=>bcrypt('user123456'),
            ]
        ];

        foreach ($userData as $key => $val){
            User::create($val);
        }
    }
}
