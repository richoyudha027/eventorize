<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membuat user dengan role admin
        User::create([
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'phone' => '081234567890',
            'address' => 'New York',
            'gender' => 'male',
            'dob' => '1990-01-01',
            'photo' => 'admin.jpg',
            'role' => 'admin',
            'password' => Hash::make('johndoe123'),
        ]);

        User::create([
            'name' => 'Schematics',
            'email' => 'sch@example.com',
            'phone' => '081234567891',
            'photo' => 'sch.jpeg',
            'role' => 'organizer',
            'password' => Hash::make('sch123'),
        ]);

        User::create([
            'name' => 'Richo Yudha Kurniawan',
            'email' => 'richo@example.com',
            'phone' => '081234567892',
            'address' => 'Surabaya',
            'gender' => 'female',
            'dob' => '1992-03-03',
            'photo' => 'user.jpg',
            'role' => 'user',
            'password' => Hash::make('richo123'),
        ]);

        User::create([
            'name' => 'Alice Organizer',
            'email' => 'alice@example.com',
            'phone' => '081234567893',
            'photo' => 'alice.png',
            'role' => 'organizer',
            'password' => Hash::make('alice123'),
        ]);

        User::create([
            'name' => 'Bob EventMaster',
            'email' => 'bob@example.com',
            'phone' => '081234567894',
            'photo' => 'bob.jpg',
            'role' => 'organizer',
            'password' => Hash::make('bob123'),
        ]);

        User::create([
            'name' => 'Charlie Coordinator',
            'email' => 'charlie@example.com',
            'phone' => '081234567895',
            'photo' => 'charlie.jpg',
            'role' => 'organizer',
            'password' => Hash::make('charlie123'),
        ]);

        User::create([
            'name' => 'David Planner',
            'email' => 'david@example.com',
            'phone' => '081234567896',
            'photo' => 'david.jpg',
            'role' => 'organizer',
            'password' => Hash::make('david123'),
        ]);

        User::create([
            'name' => 'Eve Manager',
            'email' => 'eve@example.com',
            'phone' => '081234567897',
            'photo' => 'eve.jpg',
            'role' => 'organizer',
            'password' => Hash::make('eve123'),
        ]);

        User::create([
            'name' => 'Frank Events',
            'email' => 'frank@example.com',
            'phone' => '081234567898',
            'photo' => 'frank.jpg',
            'role' => 'organizer',
            'password' => Hash::make('frank123'),
        ]);

        User::create([
            'name' => 'Grace Organizer',
            'email' => 'grace@example.com',
            'phone' => '081234567899',
            'photo' => 'grace.jpg',
            'role' => 'organizer',
            'password' => Hash::make('grace123'),
        ]);

        User::create([
            'name' => 'Hank Events',
            'email' => 'hank@example.com',
            'phone' => '081234567900',
            'photo' => 'hank.jpg',
            'role' => 'organizer',
            'password' => Hash::make('hank123'),
        ]);

        User::create([
            'name' => 'Ivy Coordinator',
            'email' => 'ivy@example.com',
            'phone' => '081234567901',
            'photo' => 'ivy.jpg',
            'role' => 'organizer',
            'password' => Hash::make('ivy123'),
        ]);

        User::create([
            'name' => 'Jack Planner',
            'email' => 'jack@example.com',
            'phone' => '081234567902',
            'photo' => 'jack.jpg',
            'role' => 'organizer',
            'password' => Hash::make('jack123'),
        ]);
    }
}
