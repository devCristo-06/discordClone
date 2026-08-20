<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServerInvite extends Model
{
    /** @use HasFactory<\Database\Factories\ServerInviteFactory> */
    use HasFactory, SoftDeletes;

    // Caratteristiche della tabella
    protected $fillable = [
        'server_id',
        'code',
        'created_by',
        'expires_at'
    ];

    /**
     * Type casting dei dati per convertire automaticamente i valori nel DB.
     */
    protected function casts(): array
    {
        return [
            'expires_at' => 'datetime',
        ];
    }

    // ------------------------------------
    // INVIO RELAZIONI TRA INVITI E TABELLE
    // ------------------------------------



    // --------------------------------------
    // RITORNO RELAZIONI TRA INVITI E TABELLE
    // --------------------------------------

    // Relazione M:1 con Inviti del server
    public function server()
    {
        return $this->belongsTo(Server::class, 'server_id');
    }

    // Relazione M:1 con Utente
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
