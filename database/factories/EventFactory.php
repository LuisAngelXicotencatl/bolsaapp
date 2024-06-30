<?php

namespace Database\Factories;
use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Event::class;
    public function definition()
    {
        return [
            'titulo' => $this->faker->sentence,
            'subtitulo' => $this->faker->sentence,
            'descripcion' => $this->faker->paragraph,
            'fecha' => $this->faker->date,
            'lugar' => $this->faker->address,
            'premio' => $this->faker->optional()->word,
            'status' => $this->faker->boolean,
        ];
    }
}
