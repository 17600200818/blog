<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration 
{
	public function up()
	{
		Schema::create('articles', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title')->index();
            $table->text('body');
            $table->string('type');
            $table->string('description');
            $table->string('images')->nullable();
            $table->integer('thumbs_up')->default(0);
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('articles');
	}
}
