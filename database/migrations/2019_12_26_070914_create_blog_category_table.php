<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogCategoryTable extends Migration
{
    public function up()
    {
        Schema::create('blog_category', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('blog_id');
            $table->integer('category_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('blog_category');
    }
}
