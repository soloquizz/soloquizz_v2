<?php

namespace Database\Factories\Administration;

use App\Models\Administration\Niveau;
use Illuminate\Database\Eloquent\Factories\Factory;

class NiveauFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Niveau::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->word,
        'annee' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s'),
        'parcour_id' => $this->faker->word
        ];
    }
}
