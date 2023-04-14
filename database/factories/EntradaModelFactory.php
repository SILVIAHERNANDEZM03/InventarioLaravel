<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EntradaModel>
 */
class EntradaModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'fechaEntrada'   =>$this->faker->dateTimeThisCentury->format('Y-m-d'),
        'cantidad'       =>$this->faker->numberBetween(100,300),
        'idProducto'      =>$this->faker->numberBetween(1,100),
        ];
    }
}
