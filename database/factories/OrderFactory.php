<?php

namespace Database\Factories;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use PhpParser\Node\Expr\FuncCall;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' =>function(){
                return User::factory()->create()->id;
            },
            'title' => fake()->title(),
            'totla_price' =>fake()->randomDigit(),
        ];
    }
}
