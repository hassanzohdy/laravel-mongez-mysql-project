<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->increments('id');
            $table->loggers();


			$table->string('original_language');
			$table->string('original_title');
			$table->string('backdrop_path');
			$table->text('overview');
			$table->string('release_date');
			$table->string('title');
			$table->integer('vote_count');
			$table->integer('original_id');
			$table->boolean('adult');
			$table->boolean('video');
			$table->float('popularity');
			$table->float('vote_average');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movies');
    }
}
