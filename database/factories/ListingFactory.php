<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $tags = ['laravel', 'js', 'php', 'backend', 'react', 'nodejs', 'frontend'];
        $tags = $this->faker->randomElements($tags, $this->faker->numberBetween(2, 4));
        $tags = implode(', ', $tags);
        return [
            'title'       => $this->faker->jobTitle(),
            'tags'        => $tags,
            'company'     => $this->faker->company(),
            'email'       => $this->faker->companyEmail(),
            'website'     => $this->faker->url(),
            'location'    => $this->faker->city(),
            'description' => $this->faker->realText(255),
        ];
    }
}
