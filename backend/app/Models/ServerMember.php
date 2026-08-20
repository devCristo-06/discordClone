<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServerMember extends Model
{
    /** @use HasFactory<\Database\Factories\ServerMemberFactory> */
    use HasFactory, SoftDeletes;

    // Caratteristiche della tabella
    protected $fillable = [
        'server_id',
        'user_id',
        'role_id',
        'joined_at'
    ];

    /**
     * Type casting dei dati per convertire automaticamente i valori nel DB.
     */
    protected function casts(): array
    {
        return [
            'joined_at' => 'datetime',
        ];
    }

    // -----------------------------------------------
    // INVIO RELAZIONI TRA MEMBRI DEL SERVER E TABELLE
    // -----------------------------------------------



    // -------------------------------------------------
    // RITORNO RELAZIONI TRA MEMBRI DEL SERVER E TABELLE
    // -------------------------------------------------

    // Relazione M:1 con Membri del server di quelli che sono presenti
    public function server()
    {
        return $this->belongsTo(Server::class, 'server_id');
    }

    // Relazione M:1 con Utenti
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relazione 1:1 con Ruoli
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
}
