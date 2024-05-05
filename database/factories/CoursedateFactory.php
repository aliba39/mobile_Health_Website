<?php

namespace Database\Factories;

use App\Models\Coursedate;
use Illuminate\Database\Eloquent\Factories\Factory;

class CoursedateFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Coursedate::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'course_id' => $this->faker->numberBetween(1,4),
            'scheduled_date' => $this->faker-> date($format = 'Y-m-d', $min = 'now', $max = '2022-1-1'),
            'max_attendee' => $this->faker-> numberBetween($min = 1, $max = 15),
            'venue' => "18 Glenda Drive, Frankton, Queenstown",
            'isActive' => $this->faker->boolean,

            'created_at' => now(),
            'updated_at' => now(),
        ];

    }
}
