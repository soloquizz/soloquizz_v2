<?php

namespace Database\Factories\Administration;

use App\Models\Administration\HasRole;
use Illuminate\Database\Eloquent\Factories\Factory;

class HasRoleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = HasRole::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'model_type' => $this->faker->word,
        'model_id' => $this->faker->word
        ];
    }
}
