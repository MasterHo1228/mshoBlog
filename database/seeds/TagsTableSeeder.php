<?php

use App\Models\Backend\Tag;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::create(['name' => 'PHP']);
        Tag::create(['name' => 'Life']);
        Tag::create(['name' => 'Others']);
    }
}
