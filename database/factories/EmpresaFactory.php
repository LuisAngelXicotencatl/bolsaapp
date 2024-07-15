<?php

namespace Database\Factories;

use App\Models\Empresa;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmpresaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Empresa::class;
    public function definition()
    {
        return [
            'Nombre' => $this->faker->company,
            'Descripcion' => $this->faker->catchPhrase,
        ];
    }
}
