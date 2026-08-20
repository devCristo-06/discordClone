<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    // Caratteristiche della tabella
    protected $fillable = [
        'name',
        'last_name',
        'username',
        'cellphone',
        'email',
        'password',
        'avatar',
        'status',
        'bio',
        'is_online',
        'last_seen',
    ];

    // Gli attributi che devono essere nascosti nelle serializzazioni JSON / API
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Type casting dei dati per convertire automaticamente i valori nel DB.
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_online' => 'boolean',
            'last_seen' => 'datetime',
        ];
    }

    // ------------------------------------
    // INVIO RELAZIONI TRA UTENTE E TABELLE
    // ------------------------------------

    // Relazione 1:1 con Impostazioni
    public function setting()
    {
        return $this->hasOne(Setting::class);
    }

    // Relazione 1:M con Server di quelli che possiede
    public function servers_owned()
    {
        return $this->hasMany(Server::class, 'owner_id');
    }

    // Relazione 1:M con Canali che ha creato
    public function channels_created()
    {
        return $this->hasMany(Channel::class, 'user_id');
    }

    // Relazione 1:M con Membri del server
    public function server_members()
    {
        return $this->hasMany(ServerMember::class);
    }

    // Relazione 1:M con Messaggi
    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    // Relazione 1:M con Amicizie (lato sender)
    public function sent_friendships()
    {
        return $this->hasMany(Friendship::class, 'sender_id');
    }

    // Relazione 1:M con Amicizie (lato receiver)
    public function received_friendships()
    {
        return $this->hasMany(Friendship::class, 'receiver_id');
    }

    // Relazione 1:M con Gruppi che ha creato
    public function conversations_created()
    {
        return $this->hasMany(Conversation::class, 'created_by');
    }

    // Relazione 1:M con Gruppi in cui è dentro
    public function conversation_members()
    {
        return $this->hasMany(ConversationMember::class);
    }
    // Relazione 1:M con Inviti
    public function server_invites()
    {
        return $this->hasMany(ServerInvite::class, 'created_by');
    }

    // --------------------------------------
    // RITORNO RELAZIONI TRA UTENTE E TABELLE
    // --------------------------------------



}
