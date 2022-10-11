<?php

namespace Database\Factories;

use App\Models\Finiquito;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class FiniquitoFactory extends Factory
{
    protected $model = Finiquito::class;

    public function definition()
    {
        return [
			'nombre' => $this->faker->name,
			'apellidop' => $this->faker->name,
			'apellidom' => $this->faker->name,
			'fecha' => $this->faker->name,
			'ejercido' => $this->faker->name,
        ];
    }
}
