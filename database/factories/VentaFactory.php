<?php

namespace Database\Factories;

use App\Models\cliente;
use App\Models\deta_product;
use App\Models\trabajador;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\venta>
 */
class VentaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'trabajador_id' => trabajador::all()->random(),
            'cliente_id' => cliente::all()->random(),
            'deta_id' => deta_product::all()->random(),
            'cantidad' =>fake()->numberBetween(0, 10),
            'date' => fake()->date(),
        ];
    }
}
