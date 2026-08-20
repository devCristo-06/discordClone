<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ConversationMember extends Model
{
    /** @use HasFactory<\Database\Factories\ConversationMemberFactory> */
    use HasFactory, SoftDeletes;

    // Caratteristiche della tabella
    protected $fillable = [
        'conversation_id',
        'user_id',
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
