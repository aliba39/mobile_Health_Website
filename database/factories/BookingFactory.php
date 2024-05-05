<?php

namespace Database\Factories;

use App\Models\Booking;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Booking::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'course_id' => $this->faker->numberBetween(1,4),
            'coursedate_id' => $this->faker->numberBetween(1,4),
            'first_name' => $this->faker-> firstName,
            'last_name' => $this->faker->lastName,
            'phone' => $this->faker->phonenumber,
            'email' => $this->faker->email(),
            'dob' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'gender' => "female",
            'company_name' => $this->faker->word(1),
            'street' => $this->faker->streetAddress,
            'suburb' => $this->faker->state,
            'city' => $this->faker->state,
            'postcode' => $this->faker->postcode,
            'country' => $this->faker->country,
            'course_total' => $this->faker->numberBetween(100,400),
            'is_terms_agreed' => $this->faker->boolean,
            'isActive' => $this->faker->boolean,

            'created_at' => now(),
            'updated_at' => now(),
        ];

    }
}
