<?php

namespace App\Domains\User\Actions;

use App\Domains\User\Models\User;
use App\Domains\User\DTOs\UserData;
use Illuminate\Support\Facades\Hash;

class UpdateUserAction
{
    public function execute(User $user, UserData $data): User
    {
        $user->update([
            'name'              => $data->name,
            'surname'           => $data->surname,
            'phone'             => $data->phone,
            'country'           => $data->country,
            'gender'            => $data->gender,
            'profile_picture'   => $data->profile_picture ?? $user->profile_picture,
            ...(isset($data->password) ? ['password' => Hash::make($data->password)] : []),
        ]);

        return $user;
    }
}
