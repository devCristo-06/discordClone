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

    // Relazione 1:1 con Impostazioni
    public function setting()
    {
        return $this->hasOne(Setting::class);
    }
}
