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
}
