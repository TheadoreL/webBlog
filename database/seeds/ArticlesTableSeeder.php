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
            'tags' => '',
            'title' => str_random(8),
            'author' => 0,
            'cover' => str_random(16),
            'content' => str_random(80),
            'status' => 'passed',
        ]);
    }
}
