<?php

namespace Database\Factories;

use App\Models\Community;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this ->faker->unique()->sentence();
        return [
            'title'=> $name,
            'slug'=> Str::slug($name),
            'body'=> $this->faker->text(2000),

            //Foreign Keys
            'community_id' => Community::all()->random()->id,
            'user_id'=> User::all()->random()->id
        ];
    }
}
