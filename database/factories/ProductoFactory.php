<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\producto>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement(['Aspiradora de alta potencia',
            'Juego de sábanas de algodón',
            'Olla a presión de acero inoxidable',
            'Batidora de mano',
            'Set de cuchillos de cocina',
            'Tostadora de pan',
            'Juego de toallas de baño',
            'Cafetera de goteo programable',
            'Plancha de vapor',
            'Cubiertos de acero inoxidable',
            'Sartén antiadherente',
            'Microondas de 1000 watts',
            'Máquina de hacer pan',
            'Robot aspirador inteligente',
            'Lámpara de pie con luz regulable',
            'Ventilador de torre',
            'Juego de contenedores de almacenamiento',
            'Máquina de café espresso',
            'Escoba y recogedor de alta calidad',
            'Purificador de aire con filtro HEPA']),
            'description' => fake()->text(20),
        ];
    }
}
