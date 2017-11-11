<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsersRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'users_roles',
            function (Blueprint $table) {
                $table->increments('id');
                $table->integer('user_id');
                $table->foreign('user_id')
                    ->unsigned()
                    ->refrences('id')->on('user')
                    ->onDelete('cascade');
                $table->integer('cabang_id');
                $table->foreign('cabang_id')
                    ->unsigned()
                    ->refrences('id')->on('cabang')
                    ->onDelete('cascade');
                $table->integer('ditetapkan_oleh')
                    ->unsigned()
                    ->refrences('id')->on('user')
                    ->onDelete('SET NULL');
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users_roles');
    }
}
