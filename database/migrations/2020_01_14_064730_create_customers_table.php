<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('code')->index()->unique();
            $table->string('name');
            $table->string('state');
            $table->longText('method');
            $table->string('date');
            $table->string('expert');
            $table->string('type');
            $table->timestamps();
        });

        Schema::create('customer_company', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('customer_id')->index();
            $table->bigInteger('code_company')->index();
            $table->string('Established_company');
            $table->bigInteger('tel_company');
            $table->bigInteger('fax_company');
            $table->longText('adders_company');
            $table->string('post_company');
            $table->timestamps();
            $table->foreign('customer_id')->references('id')
                ->on('customers')
                ->onDelete('cascade')
                ->onDelete('cascade');

        });

        Schema::create('customer_personal', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('customer_id')->index();
            $table->integer('sex');
            $table->string('date_personel');
            $table->string('codemeli_personel');
            $table->string('tel_personel');
            $table->string('phone_personel');
            $table->string('email_personel');
            $table->longText('adders_personel');
            $table->longText('text_personel');
            $table->timestamps();
            $table->foreign('customer_id')->references('id')
                ->on('customers')
                ->onDelete('cascade')
                ->onDelete('cascade');

        });


        Schema::create('company_personal', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('customer_id')->index();
            $table->string('side_company');
            $table->string('sex_company');
            $table->string('title_company');
            $table->string('name_company');
            $table->string('phone_company');
            $table->string('inside_company');
            $table->longText('email_company');
            $table->longText('tel_company_company');
            $table->timestamps();
            $table->foreign('customer_id')->references('id')
                ->on('customers')
                ->onDelete('cascade')
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
        Schema::dropIfExists('customers');
    }
}
