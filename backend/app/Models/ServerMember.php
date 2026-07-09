<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ServerMember extends Pivot
{
    /** @use HasFactory<\Database\Factories\ServerMemberFactory> */
    use HasFactory;
}
