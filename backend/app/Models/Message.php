<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
    /** @use HasFactory<\Database\Factories\MessageFactory> */
    use HasFactory, SoftDeletes;

    // Caratteristiche della tabella
    protected $fillable = [
        'channel_id',
        'conversation_id',
        'user_id',
        'content'
    ];


    // --------------------------------------
    // INVIO RELAZIONI TRA MESSAGGI E TABELLE
    // --------------------------------------

    // Relazione 1:M con i file
    public function attachments()
    {
        return $this->hasMany(Attachment::class, 'message_id');
    }

    // ----------------------------------------
    // RITORNO RELAZIONI TRA MESSAGGI E TABELLE
    // ----------------------------------------

    // Relazione 1:M con Canale
    public function channel()
    {
        return $this->belongsTo(Channel::class, 'channel_id');
    }

    // Relazione 1:M con Utente
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
