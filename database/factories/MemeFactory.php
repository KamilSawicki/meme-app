<?php

namespace Database\Factories;

use App\Models\Meme;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Meme>
 */
class MemeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user = User::all()->random()->id;
        $faker = \Faker\Factory::create();
        $title = $faker->sentence(3);
        $slug = Str::of($title)->slug();
        $file = Storage::putFile(Meme::STORAGE_PATH, resource_path('assets/images/Example.png'));

        return [
            'created_by_id' => $user,
            'updated_by_id' => $user,
            'title' => $title,
            'file' => $file,
            'slug' => $slug,
        ];
    }
}
