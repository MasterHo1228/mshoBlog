<?php

use Illuminate\Database\Seeder;
use App\Models\ArticleTypes;

class ArticleTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ArticleTypes::create([
            'name'=>'PHP'
        ]);
        ArticleTypes::create([
            'name'=>'生活'
        ]);
        ArticleTypes::create([
            'name'=>'其他'
        ]);
    }
}
