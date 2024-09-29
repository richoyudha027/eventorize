<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Event::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'event_name' => $this->faker->sentence(3),
            'location' => $this->faker->city,
            'category' => $this->faker->word,
            'fee' => $this->faker->randomFloat(2, 0, 100),
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
            'start_time' => $this->faker->time(),
            'end_time' => $this->faker->time(),
            'description' => $this->faker->paragraph(),
            'images' => 'public/template/img/' . $this->faker->word . '.jpg',
        ];
    }
}
