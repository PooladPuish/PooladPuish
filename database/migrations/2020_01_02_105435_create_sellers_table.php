<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sellers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('code')->unique()->index();
            $table->unsignedBigInteger('color_id')->index();
            $table->string('company');
            $table->string('connector');
            $table->string('side');
            $table->string('tel');
            $table->string('inside');
            $table->string('phone');
            $table->timestamps();
            $table->foreign('color_id')->references('id')->on('colors')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sellers');
    }
}
