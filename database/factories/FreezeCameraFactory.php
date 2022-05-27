<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FreezeCamera>
 */
class FreezeCameraFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $blocks = $this->faker->numberBetween(1, 200);
        return [
            'temperature' => $this->faker->numberBetween(-30, 0),
            'blocks' => $blocks,
            'free_blocks' => $blocks,
        ];
    }
}
