<?php

namespace Database\Factories\Domains\User\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Domains\User\Models\User;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->firstName,
            'surname' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'country' => $this->faker->country,
            'gender' => $this->faker->randomElement(['male', 'female']),
            'password' => Hash::make('password123'),
            'profile_picture' => 'default.jpg',
        ];
    }

}
