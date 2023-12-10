<?php

namespace Database\Factories;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Faker\Generator;
use App\Customer;




use Illuminate\Database\Eloquent\Factories\Factory;
use App\Administration\Flight;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{


    public function definition(): array
    {
        return [

            'email' => fake()->unique()->safeEmail(),
            'user_name' => fake()->userName(),
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'phone_number' => fake()->phoneNumber(),
            'password' => fake()->password(),
            'address' => fake()->address(),
            'post_code' => fake()->postcode(),
            'country' => fake()->country(),
            'city' => fake()->city(),

        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
