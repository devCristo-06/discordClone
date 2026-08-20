<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Server extends Model
{
    /** @use HasFactory<\Database\Factories\ServerFactory> */
    use HasFactory, SoftDeletes;

    // Caratteristiche della tabella
    protected $fillable = [
        'owner_id',
        'icon',
        'banner',
        'name_server',
        'desc_server'
    ];

    // ------------------------------------
    // INVIO RELAZIONI TRA SERVER E TABELLE
    // ------------------------------------

    // Relazione 1:M con Canali di quelli che esistono    
    public function channels()
    {
        return $this->hasMany(Channel::class, 'server_id');
    }

    // Relazione 1:M con Membri del server di quelli che sono presenti    
    public function server_members()
    {
        return $this->hasMany(ServerMember::class, 'server_id');
    }

    // Relazione 1:M con Inviti del server di quelli che sono presenti    
    public function server_invites()
    {
        return $this->hasMany(ServerInvite::class, 'server_id');
    }

    // --------------------------------------
    // RITORNO RELAZIONI TRA SERVER E TABELLE
    // --------------------------------------

    // Relazione M:1 con Utenti di quelli che possiede
    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
}
