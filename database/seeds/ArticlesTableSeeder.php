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
        $articles = factory(Articles::class)->times(50)->make();
        Articles::insert($articles->toArray());
    }
}
