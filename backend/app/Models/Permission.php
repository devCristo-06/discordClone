<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Permission extends Pivot
{
    /** @use HasFactory<\Database\Factories\PermissionFactory> */
    use HasFactory;
}
