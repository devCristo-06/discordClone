<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ServerInvite extends Pivot
{
    /** @use HasFactory<\Database\Factories\ServerInviteFactory> */
    use HasFactory;
}
