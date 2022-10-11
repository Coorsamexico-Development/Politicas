<?php

namespace Database\Factories;

use App\Models\Politic;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PoliticFactory extends Factory
{
    protected $model = Politic::class;

    public function definition()
    {
        return [
			'namepolitica' => $this->faker->name,
			'description' => $this->faker->name,
			'type_politic' => $this->faker->name,
			'id_statu' => $this->faker->name,
			'autor' => $this->faker->name,
			'imagePolitic' => $this->faker->name,
			'pdf' => $this->faker->name,
        ];
    }
}
