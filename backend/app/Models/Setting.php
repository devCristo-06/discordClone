<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Setting extends Pivot
{
    /** @use HasFactory<\Database\Factories\SettingFactory> */
    use HasFactory;
}
