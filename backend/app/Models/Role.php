<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Role extends Pivot
{
    /** @use HasFactory<\Database\Factories\RoleFactory> */
    use HasFactory;
}
