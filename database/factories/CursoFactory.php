<?php

namespace Database\Factories;
use App\Models\Curso;
use Illuminate\Database\Eloquent\Factories\Factory;

class CursoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Curso::class;
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(), 
            'descripcion' => $this->faker->paragraph(),
            'avatar' => $this->faker->randomElement(["PHP", "JS"])
        ];
    }
}
