<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Server extends Pivot
{
    /** @use HasFactory<\Database\Factories\ServerFactory> */
    use HasFactory;
}
