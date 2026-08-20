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

    // --------------------------------------
    // INVIO RELAZIONI TRA AMICIZIE E TABELLE
    // --------------------------------------



    // ------------------------------------
    // RITORNO RELAZIONI TRA AMICIZIE E TABELLE
    // ----------------------------------------

    // Relazione M:M con Amicizie (lato sender)
    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    // Relazione M:M con Amicizie (lato reicever)
    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }
}
