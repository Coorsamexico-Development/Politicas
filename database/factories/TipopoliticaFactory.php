<?php

namespace Database\Factories;

use App\Models\Tipopolitica;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TipopoliticaFactory extends Factory
{
    protected $model = Tipopolitica::class;

    public function definition()
    {
        return [
			'name' => $this->faker->name,
			'status' => $this->faker->name,
        ];
    }
}
