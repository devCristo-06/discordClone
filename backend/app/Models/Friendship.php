<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Friendship extends Model
{
    /** @use HasFactory<\Database\Factories\FriendshipFactory> */
    use HasFactory, SoftDeletes;

    // Caratteristiche della tabella
    protected $fillable = [
        'sender_id',
        'receiver_id',
        'status'
    ];
}
