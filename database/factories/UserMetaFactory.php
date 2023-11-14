<?php

namespace Database\Factories;

use App\Models\UserMeta;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class UserMetaFactory extends Factory
{
    protected $model = UserMeta::class;

    public function definition(): array
    {
        return [
            'firstName' => $this->faker->firstName(),
            'lastName' => $this->faker->lastName(),
            'dob' => $this->faker->date(),
            'avatar' => $this->faker->image(),
            'bio' => $this->faker->paragraph(5),
            'facebookProfile' => $this->faker->url(),
            'instagramProfile' => $this->faker->url(),
            'linkedinProfile' => $this->faker->url(),
            'githubProfile' => $this->faker->url(),
            'personalWebsite' => $this->faker->url(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
