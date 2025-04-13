<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'name'              => 'required|string|max:255',
            'surname'           => 'required|string|max:255',
            'email'             => 'required|email|unique:users,email',
            'phone'             => 'nullable|string|max:20',
            'country'           => 'required|string',
            'gender'            => 'required|in:male,female,other',
            'password'          => 'required|string|min:8|confirmed',
            'profile_picture'   => 'nullable|image|max:2048',
        ];
    }
}

?>