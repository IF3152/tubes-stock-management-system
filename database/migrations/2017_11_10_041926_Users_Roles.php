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
                $table->integer('user_id')->unsigned();
                $table->foreign('user_id')
                    ->references('id')->on('users')
                    ->onDelete('cascade');
                $table->integer('cabang_id')->unsigned();
                $table->foreign('cabang_id')
                    ->references('id')->on('cabangs')
                    ->onDelete('cascade');
                $table->integer('ditetapkan_oleh')
                    ->unsigned()
                    ->references('id')->on('users')
                    ->onDelete('SET NULL');
                $table->timestamps();
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
