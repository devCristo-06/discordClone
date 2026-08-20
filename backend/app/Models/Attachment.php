<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    /** @use HasFactory<\Database\Factories\AttachmentFactory> */
    use HasFactory;

    // Caratteristiche della tabella
    protected $fillable = [
        'message_id',
        'file_name',
        'mime_type',
        'path',
        'size',
        'uploaded_at'
    ];

    /**
     * Type casting dei dati per convertire automaticamente i valori nel DB.
     */
    protected function casts(): array
    {
        return [
            'uploaded_at' => 'timestamp',
        ];
    }
}
