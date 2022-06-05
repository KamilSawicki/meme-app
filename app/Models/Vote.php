<?php

namespace App\Models;

use App\Enums\VoteEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    protected $casts = [
        'created_at' => 'datetime',
        'update_at' => 'datetime',
        'deleted_at' => 'datetime',
        'vote' => VoteEnum::class,
    ];
}
