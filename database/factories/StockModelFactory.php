<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StockModel>
 */
class StockModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'idProducto'      =>$this->faker->numberBetween(1,100),
        'cantidad'       =>$this->faker->numberBetween(100,300),
        'disponible'     =>$this->faker->numberBetween(100,300),
        
        ];
    }
}
