<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToLikesTable extends Migration
{
    public function up()
    {
        Schema::table('likes', function (Blueprint $table) {
            $table->unsignedBigInteger('post_id');
            $table->foreign('post_id', 'post_fk_4398643')->references('id')->on('posts');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_fk_4398644')->references('id')->on('users');
        });
    }
}
