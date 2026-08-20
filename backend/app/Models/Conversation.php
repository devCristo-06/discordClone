<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Conversation extends Model
{
    /** @use HasFactory<\Database\Factories\ConversationFactory> */
    use HasFactory, SoftDeletes;

    // Caratteristiche della tabella
    protected $fillable = [
        'created_by',
        'type'
    ];


    // ------------------------------------
    // INVIO RELAZIONI TRA GRUPPI E TABELLE
    // ------------------------------------

    // Relazione 1:M con Membri del gruppo
    public function members()
    {
        return $this->hasMany(ConversationMember::class, 'conversation_id');
    }

    // --------------------------------------
    // RITORNO RELAZIONI TRA GRUPPI E TABELLE
    // --------------------------------------

    // Relazione M:1 con Utente (lato creatore del gruppo)
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
