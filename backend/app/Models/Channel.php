<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    /** @use HasFactory<\Database\Factories\ChannelFactory> */
    use HasFactory;

    // Caratteristiche della tabella
    protected $fillable = [
        'server_id',
        'user_id',
        'name_channel',
        'description_channel',
        'position',
        'type',
        'visibility'
    ];

    /**
     * Type casting dei dati per convertire automaticamente i valori nel DB.
     */
    protected function casts(): array
    {
        return [
            'visibility' => 'boolean',
        ];
    }

    // ------------------------------------
    // INVIO RELAZIONI TRA CANALI E TABELLE
    // ------------------------------------

    // Relazione 1:M con Messaggi
    public function messages()
    {
        return $this->hasMany(Message::class, 'channel_id');
    }


    // --------------------------------------
    // RITORNO RELAZIONI TRA CANALI E TABELLE
    // --------------------------------------

    // Relazione M:1 con Utente
    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relazione M:1 con Server
    public function server()
    {
        return $this->belongsTo(Server::class, 'server_id');
    }
}
