<?php

namespace App\Models\Traits;

trait HasUuid
{
    public static function bootHasUuid(): void
    {
        static::creating(function ($model) {
            $model->id = (string) \Illuminate\Support\Str::uuid();
        });
    }

    public function getRouteKeyName(): string
    {
        return 'id';
    }

    public function getKeyType(): string
    {
        return 'string';
    }
}
