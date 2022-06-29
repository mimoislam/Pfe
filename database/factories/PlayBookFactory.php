<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PlayBook>
 */
class PlayBookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "name"=>"test",
            "system"=>"test",
            "user_id"=>\App\Models\User::factory()->create()->id,
            "githubUrl"=>"https://github.com/mimoislam/gamma",
            "description"=>"test",




        ];
    }
}
