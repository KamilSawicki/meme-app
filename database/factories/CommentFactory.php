<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Meme;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $meme = Meme::all()->random()->id;

        $content = $this->faker->text();
        $user = User::all()->random()->id;

        if (Comment::all()->isEmpty())
            return [
                'meme_id' => $meme,
                'content' => $content,
                'created_by_id' => $user,
                'updated_by_id' => $user,
            ];
        else {
            $comment = Comment::all()->random()->id;
            return [
                'comment_id' => $comment,
                'content' => $content,
                'created_by_id' => $user,
                'updated_by_id' => $user,
            ];
        }
    }
}
