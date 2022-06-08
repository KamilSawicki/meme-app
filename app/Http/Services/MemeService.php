<?php

namespace App\Http\Services;

use App\Http\Extensions\ResponseBuilder;
use App\Models\Meme;
use Illuminate\Support\Facades\Storage;

class MemeService {
    public static function getAcceptedMemes() : array {
        $memes = Meme::query()
            ->where('is_accepted', true)
            ->paginate(10)
            ->toArray();

        dump(Meme::query()->where('is_accepted', true)->get()->first()->toArray());

        $responseSchema = [
            'created_by' => [
                'id',
                'name',
            ],
            'title',
            'slug',
            'file' => fn($file) => Storage::path($file),
            'votes_result',
            'comments' => [
                'id',
                'content',
                'created_by' => [
                    'id',
                    'name',
                ],
                'comments' => [
                    'id',
                    'content',
                    'created_by' => [
                        'id',
                        'name',
                    ],
                ],
            ]
        ];

        $memes['data'] = ResponseBuilder::build($memes['data'], $responseSchema);

        return $memes;
    }
}
