<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactMessages extends Model
{
    protected $fillable = [
        'sender_name',
        'sender_contact',
        'subject',
        'message',
        'user_id',
        'sent_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}