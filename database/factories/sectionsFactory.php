<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class sectionsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $names = ['بن دول', 'الكريمي'];

        return [
            'section_name' => $this->faker->randomElement($names),
            'created_by'=> $this->faker->firstName,
        ];
    }
}
