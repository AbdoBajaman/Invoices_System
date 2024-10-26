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
<<<<<<< HEAD
            //  "section"=>$this->faker->word(),
            'section_id'=>$this->faker->randomNumber(1,3),

            'Amount_Commission'=> $this->faker->numberBetween(0,15),
            'Amount_collection'=>50000,
=======

>>>>>>> 13c1e0c3d1f12f1ecc8641211bcad67a6fabfa5a
            "due_date"=> $this->faker->dateTime(),
            "rate_tax"=> $this->faker->name(),
            "value_tax"=> $this->faker->randomNumber(5, false),
            "total"=> $this->faker->randomNumber(5, false),
            "status"=> $this->faker->name(),
            "value_status"=> $this->faker->numberBetween(1,10),
            "note"=> $this->faker->text(),
<<<<<<< HEAD
            // "user"=> $this->faker->userName(),
            'discount'=> $this->faker->numberBetween(1,10),
            'Payment_Date'=> $this->faker->date('Y-m-d'),
=======
            "user"=> $this->faker->userName(),
            'discount'=> $this->faker->numberBetween(1,10),
>>>>>>> 13c1e0c3d1f12f1ecc8641211bcad67a6fabfa5a

        ];
    }
}
