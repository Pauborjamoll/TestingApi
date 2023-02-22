<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Community>
 */
class CommunityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
      
        $name = $this->faker->unique()->word(20);
        return [
            'name' => $name,
            // 'description' => $this->faker->sentence(),
            'user_id' => User::all()->random()->id,
        ];
    }
}
