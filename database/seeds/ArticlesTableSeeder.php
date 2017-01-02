<?php

use App\Models\Articles;
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

        $articles = factory(Articles::class)->times(50)->make()->each(function ($article) use ($faker, $user_ids) {
            $article->user_id = $faker->randomElement($user_ids);
        });

        Articles::insert($articles->toArray());
    }
}
