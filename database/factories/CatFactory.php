<?php

namespace Database\Factories;

use App\Models\Breed;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class CatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::find(1),
            'name' => $this->faker->name(),
            'breed_id' => Breed::find($this->faker->numberBetween(1,63)),
            'description' => $this->faker->text(),
            'birthday' => $this->faker->dateTimeBetween('-5 years', 'now'),
            'weight' => $this->faker->randomFloat(1,1,8),
            'sex' => Arr::random(['M','F']),
            'address' => $this->faker->address(),
            'address_latitude' => $this->faker->latitude(8,9),
            'address_longitude' => $this->faker->longitude(-79,-80),
            'photo' => $this->faker->image(public_path('storage'),640,480, 'cats', false),
        ];
    }
}
