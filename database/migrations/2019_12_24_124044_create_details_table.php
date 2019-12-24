<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('label');
            $table->timestamps();
        });
        Schema::create('detail_user', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('detail_id');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('detail_id')
                ->references('id')
                ->on('details')->onDelete('cascade')->onUpdate('cascade');

            $table->primary(['user_id', 'detail_id']);


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('details');
    }
}
