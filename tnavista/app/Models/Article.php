<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'summary',
        'content',
        'author_name',
        'published_at'
    ];

    protected $casts = [
        'published_at' => 'datetime'
    ];
} 