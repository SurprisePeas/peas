<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use \App\Article;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->delete();

        for ($i = 0; $i < 20; $i++) {
            Article::create([
                'title'   => 'Titile' . $i,
                'body'    => 'Body' . $i,
                'user_id' => 1,
            ]);
        }
    }
}
