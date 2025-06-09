<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamMembers extends Model
{
    protected $fillable = [
        'full_name',
        'role',
        'bio',
        'photo_url',
        'skills',
    ];

    protected $casts = [
        'skills' => 'array',
    ];
}