<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Channel extends Pivot
{
    /** @use HasFactory<\Database\Factories\ChannelFactory> */
    use HasFactory;
}
