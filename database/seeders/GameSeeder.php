<?php

namespace Database\Seeders;

use App\Models\Game;
use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            Game::create([
                'title' => fake()->name(),
                'cover_art' => fake()->imageUrl(),
                'develop' => fake()->name(),
                'release_year' => fake()->year(),
                'genre' => fake()->name(),
            ]);
        }
    }
}
