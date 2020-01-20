<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePolymericsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('polymerics', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('code')->unique()->index();
            $table->unsignedBigInteger('product_id')->index();
            $table->string('type');
            $table->string('grid');
            $table->string('name');
            $table->longText('description')->nullable();
            $table->timestamps();
            $table->foreign('product_id')->references('id')->on('products')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('polymerics');
    }
}
