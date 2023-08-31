<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class ArticleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 20) as $index) {
            $title = $faker->sentence;
            $article = Article::create([
                'title' => $title,
                'slug' => Str::slug($title),
                'content' => $faker->text(200),
                'likes' => $faker->numberBetween(0, 100),
                'views' => $faker->numberBetween(0, 1000),
                'created_at' => $faker->dateTimeBetween('-2 years', 'now'),
                'updated_at' => $faker->dateTimeBetween('-2 years', 'now'),
            ]);

            foreach (range(1, rand(1, 5)) as $commentIndex) {
                Comment::create([
                    'article_id' => $article->id,
                    'content' => $faker->paragraph,
                    'created_at' => $faker->dateTimeBetween('-2 years', 'now'),
                    'updated_at' => $faker->dateTimeBetween('-2 years', 'now'),
                ]);
            }
        }
    }
}
