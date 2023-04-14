<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProveedorModel>
 */
class ProveedorModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'razonSocial'    => $this->faker->word,
            'nombreCompleto' => $this->faker->name,
            'direccion'      => $this->faker->address,
            'telefono' => $this->faker->numberBetween($min = 1000000000, $max = 9999999999),
            'correo'         => $this->faker->unique()->safeEmail(),
            'rfc'            => $this->faker->text(13)
        ];
    }
}
