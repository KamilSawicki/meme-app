<?php

namespace App\Models;

use App\Enums\VoteEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    protected $casts = [
        'created_at' => 'datatime',
        'update_at' => 'datatime',
        'deleted_at' => 'datatime',
        'vote' => VoteEnum::class,
    ];
}
