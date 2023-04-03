<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Password>
 */
class PasswordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'site' => $this->faker->realText(10),
            'maddr' => Str::random(10).'@gmail.com',
            'account' => $this->faker->realText(20),
            'pass' => bcrypt('secret'),
            'bikou' => $this->faker->realText(50),
        ];
    }
}
