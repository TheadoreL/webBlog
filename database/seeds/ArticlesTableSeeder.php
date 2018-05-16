<?php

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
        DB::table('articles')->insert([
        	'number' => '000',
            'title' => str_random(8),
            'author' => str_random(6),
            'content' => str_random(80),
            'status' => 1,
        ]);
    }
}
