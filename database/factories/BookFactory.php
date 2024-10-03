<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random()->id,
            "title" => $title= $this->faker->sentence(),
            'author' => $this->faker->name(),
            'published_year' => $this->faker->year(),
            'gender' => $this->faker->text(5),
            'description'=>$this->faker->text(300),
            'slug' => Str::slug($title),
        ];
    }
}