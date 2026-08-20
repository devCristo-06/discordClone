<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    /** @use HasFactory<\Database\Factories\SettingFactory> */
    use HasFactory;


    // Caratteristiche della tabella
    protected $fillable = [
        'user_id',
        'theme',
        'language',
        'notifications'
    ];

    /**
     * Type casting dei dati per convertire automaticamente i valori nel DB.
     */
    protected function casts(): array
    {
        return [
            'notifications' => 'boolean',
        ];
    }

    // ------------------------------------------
    // INVIO RELAZIONI TRA IMPOSTAZIONI E TABELLE
    // ------------------------------------------



    // --------------------------------------------
    // RITORNO RELAZIONI TRA IMPOSTAZIONI E TABELLE
    // --------------------------------------------

    // Relazione 1:1 con Utent
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
