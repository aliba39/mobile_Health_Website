<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'course_name' => $this->faker->realText(25),
            'course_desc_long' => $this->faker->sentence() . "\n" . $this->faker->sentence() . "\n" . $this->faker->sentence(),
            'course_desc_short' => $this->faker->paragraph(2),
            'price' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 100, $max = 200),
            'duration' => $this->faker->numberBetween(1,3),
            'start_time' => $this->faker->time,
            'end_time' => $this->faker->time,
            'image' => '1.jpg',
            'image_path' => '/images/icons/' . $this->faker->numberBetween(1, 4) . ".png",
            'isActive' => $this->faker->boolean,

            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
