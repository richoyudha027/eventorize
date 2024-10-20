<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\User;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $organizer1 = User::where('email', 'alice@example.com')->first();
        $organizer2 = User::where('email', 'bob@example.com')->first();
        $organizer3 = User::where('email', 'charlie@example.com')->first();
        $organizer4 = User::where('email', 'david@example.com')->first();
        $organizer5 = User::where('email', 'eve@example.com')->first();
        $organizer6 = User::where('email', 'frank@example.com')->first();
        $organizer7 = User::where('email', 'grace@example.com')->first();
        $organizer8 = User::where('email', 'hank@example.com')->first();
        $organizer9 = User::where('email', 'ivy@example.com')->first();
        $organizer10 = User::where('email', 'jack@example.com')->first();

        Event::create([
            'name' => 'Tech Conference 2024',
            'organizer_u_id' => $organizer1->id,
            'location' => 'Jakarta',
            'category' => 'Technology',
            'fee' => 100000,
            'start_date' => '2024-12-01',
            'end_date' => '2024-12-02',
            'start_time' => '09:00:00',
            'end_time' => '17:00:00',
            'description' => 'A conference about the latest technology trends.',
            'image' => 'tech_conf.jpg',
        ]);

        Event::create([
            'name' => 'Music Festival 2024',
            'organizer_u_id' => $organizer2->id,
            'location' => 'Bali',
            'category' => 'Music',
            'fee' => 200000,
            'start_date' => '2024-06-10',
            'end_date' => '2024-06-12',
            'start_time' => '10:00:00',
            'end_time' => '23:00:00',
            'description' => 'Annual music festival with top bands and artists.',
            'image' => 'music_fest.jpg',
        ]);

        Event::create([
            'name' => 'Startup Expo 2024',
            'organizer_u_id' => $organizer3->id,
            'location' => 'Surabaya',
            'category' => 'Business',
            'fee' => 50000,
            'start_date' => '2024-08-15',
            'end_date' => '2024-08-16',
            'start_time' => '09:00:00',
            'end_time' => '18:00:00',
            'description' => 'Expo showcasing new startups and innovation.',
            'image' => 'startup_expo.jpg',
        ]);

        Event::create([
            'name' => 'Art Exhibition 2024',
            'organizer_u_id' => $organizer4->id,
            'location' => 'Bandung',
            'category' => 'Art',
            'fee' => 75000,
            'start_date' => '2024-09-20',
            'end_date' => '2024-09-22',
            'start_time' => '10:00:00',
            'end_time' => '20:00:00',
            'description' => 'Exhibition of modern and traditional art pieces.',
            'image' => 'art_exhibit.jpg',
        ]);

        Event::create([
            'name' => 'Food Carnival 2024',
            'organizer_u_id' => $organizer5->id,
            'location' => 'Medan',
            'category' => 'Food',
            'fee' => 50000,
            'start_date' => '2024-11-05',
            'end_date' => '2024-11-06',
            'start_time' => '11:00:00',
            'end_time' => '22:00:00',
            'description' => 'Carnival featuring the best food and cuisines.',
            'image' => 'food_carnival.jpg',
        ]);

        Event::create([
            'name' => 'Sports Marathon 2024',
            'organizer_u_id' => $organizer6->id,
            'location' => 'Yogyakarta',
            'category' => 'Sports',
            'fee' => 150000,
            'start_date' => '2024-04-22',
            'end_date' => '2024-04-22',
            'start_time' => '06:00:00',
            'end_time' => '13:00:00',
            'description' => 'Annual marathon event with prizes.',
            'image' => 'sports_marathon.jpg',
        ]);

        Event::create([
            'name' => 'Fashion Week 2024',
            'organizer_u_id' => $organizer7->id,
            'location' => 'Jakarta',
            'category' => 'Fashion',
            'fee' => 250000,
            'start_date' => '2024-03-12',
            'end_date' => '2024-03-14',
            'start_time' => '12:00:00',
            'end_time' => '21:00:00',
            'description' => 'Fashion week showcasing top designers.',
            'image' => 'fashion_week.jpg',
        ]);

        Event::create([
            'name' => 'Book Fair 2024',
            'organizer_u_id' => $organizer8->id,
            'location' => 'Semarang',
            'category' => 'Education',
            'fee' => 30000,
            'start_date' => '2024-10-10',
            'end_date' => '2024-10-12',
            'start_time' => '09:00:00',
            'end_time' => '18:00:00',
            'description' => 'Book fair with various publishers and authors.',
            'image' => 'book_fair.jpg',
        ]);

        Event::create([
            'name' => 'Film Festival 2024',
            'organizer_u_id' => $organizer9->id,
            'location' => 'Malang',
            'category' => 'Film',
            'fee' => 120000,
            'start_date' => '2024-07-18',
            'end_date' => '2024-07-20',
            'start_time' => '13:00:00',
            'end_time' => '23:00:00',
            'description' => 'International film festival with screenings and awards.',
            'image' => 'film_festival.jpg',
        ]);

        Event::create([
            'name' => 'Health & Wellness Expo 2024',
            'organizer_u_id' => $organizer10->id,
            'location' => 'Denpasar',
            'category' => 'Health',
            'fee' => 100000,
            'start_date' => '2024-05-25',
            'end_date' => '2024-05-26',
            'start_time' => '08:00:00',
            'end_time' => '18:00:00',
            'description' => 'Expo about health, wellness, and fitness.',
            'image' => 'wellness_expo.jpg',
        ]);
    }
}
