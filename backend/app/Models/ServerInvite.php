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
}
