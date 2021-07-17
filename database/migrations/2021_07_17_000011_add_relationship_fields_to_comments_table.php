<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCommentsTable extends Migration
{
    public function up()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_fk_4398619')->references('id')->on('users');
            $table->unsignedBigInteger('post_id');
            $table->foreign('post_id', 'post_fk_4398641')->references('id')->on('posts');
        });
    }
}
