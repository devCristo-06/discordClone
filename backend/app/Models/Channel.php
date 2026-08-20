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
        'desc_channel',
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
}
