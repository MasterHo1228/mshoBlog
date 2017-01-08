<?php

use App\Models\Article;
use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_ids = ['1'];
        $faker = app(Faker\Generator::class);

        $articles = factory(Article::class)->times(50)->make()->each(function ($articles) use ($faker, $user_ids) {
            $articles->user_id = $faker->randomElement($user_ids);
        });
        Article::insert($articles->toArray());
    }
}
