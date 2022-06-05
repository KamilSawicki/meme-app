<?php

namespace App\Models;

use App\Models\Traits\HasUuid;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Cache;

class Meme extends Model
{
    use HasFactory, HasUuid;

    CONST STORAGE_PATH = 'public/memes';

    protected $table = 'memes';

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    protected $attributes = [
        'created_by_id' => null,
        'updated_by_id' => null,
        'deleted_by_id' => null,
        'created_at' => null,
        'updated_at' => null,
        'deleted_at' => null,
        'title' => null,
        'slug' => null,
        'file' => null
    ];

    protected $appends = [
        'votes_result' => 0
    ];

    //relations
    public function createdBy(): BelongsTo {
        return $this->belongsTo(User::class, 'created_by_id');
    }
    public function updatedBy(): BelongsTo {
        return $this->belongsTo(User::class, 'updated_by_id');
    }
    public function deletedBy(): BelongsTo {
        return $this->belongsTo(User::class, 'deleted_by_id');
    }
    public function votes(): HasMany {
        return $this->hasMany(Vote::class);
    }
    public function comments(): HasMany {
        return $this->hasMany(Comment::class);
    }

    //mutators
    protected function votesResult(): Attribute {
        return Attribute::make(
            get: fn($value, $attributes) => Cache::remember('meme_votesResult_' . $this->id,
                now()->addMinutes(15),
                fn () => $this->votes->sum(fn($v) => $v->vote->value)
            )
        );
    }

    //overrides
    public function toArray() : array {
        return [
            'id' => $this->id,
            'created_by' => $this->createdBy->toArray(),
            'updated_by' => $this->updatedBy->toArray(),
            'deleted_by' => $this->deletedBy?->toArray(),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
            'title' => $this->title,
            'slug' => $this->slug,
            'file' => $this->file,
            'votes_result' => $this->votes_result,
            'comments' => $this->comments->toArray()
        ];
    }
}
