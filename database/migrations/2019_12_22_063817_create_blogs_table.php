<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogsTable extends Migration
{

    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug')->unique()->index()->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('title');
            $table->text('body');
            $table->string('featured_image')->nullable();
            $table->string('deleted_at')->nullable();
            $table->integer('status')->default(0)->nullable();

            $table->integer('user_id')->unsigned()->index()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('blogs');
    }
}
