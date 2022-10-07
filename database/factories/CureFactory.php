<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cure>
 */
class CureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'cure_type_id' => 1,
            'rack_id' => 1,
            'cure_unit_id' => 1,
            'code' => fake()->name(),
            'name' => fake()->name(),
            'minimum_stock' => 0,
            'purchase_price' => 0,
            'selling_price' => 0,
        ];
    }
}
