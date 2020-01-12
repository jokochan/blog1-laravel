<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusToBlogsTable extends Migration
{
    public function up()
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->integer('status')->default(0)->nullable();

        });
    }

    public function down()
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}
