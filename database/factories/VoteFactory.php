<?php

namespace Database\Factories;

use App\Models\Meme;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vote>
 */
class VoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user = User::all()->random()->id;
        $meme = Meme::all()->random()->id;
        $value = rand(-1, 1);

        return [
            'created_by_id' => $user,
            'updated_by_id' => $user,
            'meme_id' => $meme,
            'vote' => $value
        ];
    }
}
