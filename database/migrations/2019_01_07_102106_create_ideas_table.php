<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIdeasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ideas', function(Blueprint $table)
        {
            $table -> increments('id');
            $table -> string('title');
            $table -> string('description');
            $table -> string ('result');
            $table->timestamp('created_at');
            $table->timestamp('published_at');
            $table->timestamp('deleted_at');
            $table -> boolean('published');
            $table -> boolean ('deleted');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ideas');
    }
}
