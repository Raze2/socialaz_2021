<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToUserFriendsTable extends Migration
{
    public function up()
    {
        Schema::table('user_friends', function (Blueprint $table) {
            $table->unsignedBigInteger('first_user_id');
            $table->foreign('first_user_id', 'first_user_fk_4398649')->references('id')->on('users');
            $table->unsignedBigInteger('second_user_id');
            $table->foreign('second_user_id', 'second_user_fk_4398650')->references('id')->on('users');
        });
    }
}
