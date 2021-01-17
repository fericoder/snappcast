<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->string('title');
            $table->string('type');
            $table->integer('price')->nullable();
            $table->string('slug');
            $table->text('description');
            $table->text('body');
            $table->text('images');
            $table->text('allEpisodes')->nullable();
            $table->integer('viewCount');
            $table->integer('commnetCount');
            $table->integer('episodesCount')->nullable();
            $table->string('telegram')->default('on');
            $table->string('instagram')->default('off');
            $table->string('notified')->default(0);
            $table->text('attachment')->nullable();
            $table->integer('buyCount')->nullable();
            $table->timestamp('published_at');
            $table->timestamps();
            $table->softDeletes();

        });


    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
