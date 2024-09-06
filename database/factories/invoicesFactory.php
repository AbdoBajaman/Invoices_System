<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\invoices>
 */
class invoicesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "product"=> $this->faker->name(),
            "invoice_number"=> $this->faker->randomNumber(1,10),
            "section"=> $this->faker->name(),
            "invoice_date"=> $this->faker->dateTime(),

            "due_date"=> $this->faker->dateTime(),
            "rate_tax"=> $this->faker->name(),
            "value_tax"=> $this->faker->randomNumber(5, false),
            "total"=> $this->faker->randomNumber(5, false),
            "status"=> $this->faker->name(),
            "value_status"=> $this->faker->numberBetween(1,10),
            "note"=> $this->faker->text(),
            "user"=> $this->faker->userName(),
            'discount'=> $this->faker->numberBetween(1,10),

        ];
    }
}
