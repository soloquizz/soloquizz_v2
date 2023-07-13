<?php

namespace Database\Factories\Administration;

use App\Models\Administration\Cours;
use Illuminate\Database\Eloquent\Factories\Factory;

class CoursFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cours::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->word,
        'lien' => $this->faker->word,
        'etat' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s'),
        'classe_id' => $this->faker->word,
        'semestre_id' => $this->faker->word
        ];
    }
}
