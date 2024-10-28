<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class productsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            //
            'product_name'=> $this->faker->name(),
            'description'=> $this->faker->sentence(),
            'section_id'=> $this->faker->numberBetween(1,2),
        ];
    }
}
