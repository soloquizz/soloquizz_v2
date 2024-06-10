<?php

namespace Database\Factories\Administration;

use App\Models\Administration\Candidats;
use Illuminate\Database\Eloquent\Factories\Factory;

class CandidatsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Candidats::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'prenom' => $this->faker->word,
        'nom' => $this->faker->word,
        'email' => $this->faker->word,
        'telephone' => $this->faker->word,
        'pays_residance' => $this->faker->word,
        'niveau_etude' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
