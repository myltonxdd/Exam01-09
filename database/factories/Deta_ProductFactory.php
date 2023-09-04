<?php

namespace Database\Factories;

use App\Models\producto;
use App\Models\venta;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\deta_product>
 */
class Deta_ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'productos_id' => producto::all()->random(),
            'cantidad' =>fake()->numberBetween(0, 10),
        ];
    }
}
