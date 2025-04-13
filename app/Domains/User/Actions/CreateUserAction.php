<?php

namespace App\Domains\User\Actions;

use App\Domains\User\Models\User;
use App\Domains\User\DTOs\UserData;
use Illuminate\Support\Facades\Hash;

class CreateUserAction
{
    public function execute(UserData $data): User
    {
        return User::create([
            'name'              => $data->name,
            'surname'           => $data->surname,
            'email'             => $data->email,
            'phone'             => $data->phone,
            'country'           => $data->country,
            'gender'            => $data->gender,
            'password'          => Hash::make($data->password),
            'profile_picture'   => $data->profile_picture,
        ]);
    }
}
