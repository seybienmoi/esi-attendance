<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    protected $model = Student::class;

    public function definition()
    {
        return [
            'matricule' => $this->faker->unique()->numerify('202400#'),
            'nom' => $this->faker->lastName,
            'prenom' => $this->faker->firstName,
            'cours1' => $this->faker->word,
            'cours2' => $this->faker->word,
            'cours3' => $this->faker->word,
            'cours4' => $this->faker->word,
        ];
    }
}
