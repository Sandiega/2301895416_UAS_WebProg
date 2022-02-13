<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignid('role_id')->references('id')->on('role')->onDelete('cascade');
            $table->foreignid('gender_id')->references('id')->on('gender')->onDelete('cascade');

            $table->string('first_name',25)->nullable(false);
            $table->string('middle_name',25)->nullable(true);
            $table->string('last_name',25)->nullable(false);
            $table->string('email',50)->nullable(false);
            $table->string('password')->nullable(false);
            $table->string('display_picture_link')->nullable(false);
            $table->integer('delete_flag')->nullable(true);
            $table->date('modified_at')->nullable(true);
            $table->string('modified_by')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
