<?php

namespace Database\Factories\Administration;

use App\Models\Administration\Administrateur;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdministrateurFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Administrateur::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'matricule' => $this->faker->word,
        'prenom' => $this->faker->word,
        'nom' => $this->faker->word,
        'telephone' => $this->faker->word,
        'email_personnel' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
