<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ConversationMember extends Pivot
{
    /** @use HasFactory<\Database\Factories\ConversationMemberFactory> */
    use HasFactory;
}
