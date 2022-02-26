<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->timestamps();

            $table->string("title");
            $table->string("src");
            $table->boolean("is_long");
            $table->unsignedInteger("chapter_id")->nullable();
            $table->unsignedInteger("chapter_order")->nullable();
            $table->integer("agrees");

            //$table->string("image_src");
            $table->string("description");
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
