<?php

namespace App\Domains\User\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'email',
        'phone',
        'country',
        'gender',
        'password',
        'profile_picture',
    ];
    
    //
}
