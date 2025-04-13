<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name'              => 'required|string|max:255',
            'surname'           => 'required|string|max:255',
            'phone'             => 'nullable|string|max:20',
            'country'           => 'required|string',
            'gender'            => 'required|in:male,female,other',
            'profile_picture'   => 'nullable|image|max:2048',
        ];
    }
}
