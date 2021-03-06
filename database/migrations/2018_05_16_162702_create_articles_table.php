<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id')->autoIncrement();
            $table->string('tags', 255);
            $table->string('number', 20)->default('000');
            $table->string('cover', 255);
            $table->string('title', 255);
            $table->integer('author');
            $table->text('content');
            $table->timestamps();
            $table->enum('status', ['wait', 'passed', 'delete']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
