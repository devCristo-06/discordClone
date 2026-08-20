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
}
