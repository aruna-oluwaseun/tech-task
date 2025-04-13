<?php

namespace App\Domains\User\DTOs;

use App\Domains\User\Models\User;
use Illuminate\Support\Facades\Hash;

class UserData
{
    public function __construct(
        public string $name,
        public string $surname,
        public ?string $email = null,
        public ?string $phone,
        public string $country,
        public string $gender,
        public ?string $password = null,
        public ?string $profile_picture = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            name: $data['name'],
            surname: $data['surname'],
            email: $data['email'] ?? null,
            phone: $data['phone'] ?? null,
            country: $data['country'],
            gender: $data['gender'],
            password: $data['password'] ?? null,
            profile_picture: $data['profilePicture'] ?? null,
        );
    }
}
