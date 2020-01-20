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
            $table->longText('description')->nullable();
            $table->timestamps();
        });

        Schema::create('customer_company', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('customer_id')->index();
            $table->bigInteger('code_company')->index()->nullable();
            $table->string('Established_company')->nullable();
            $table->bigInteger('tel_company');
            $table->bigInteger('fax_company')->nullable();
            $table->longText('adders_company')->nullable();
            $table->string('post_company')->nullable();
            $table->timestamps();
            $table->foreign('customer_id')->references('id')
                ->on('customers')
                ->onDelete('cascade')
                ->onUpdate('cascade');

        });

        Schema::create('customer_personal', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('customer_id')->index();
            $table->integer('sex');
            $table->string('date_personel')->nullable();
            $table->string('codemeli_personel')->nullable();
            $table->string('fax_personel')->nullable();
            $table->string('tel_personel')->nullable();
            $table->string('phone_personel');
            $table->string('email_personel')->nullable();
            $table->longText('adders_personel')->nullable();
            $table->longText('text_personel')->nullable();
            $table->timestamps();
            $table->foreign('customer_id')->references('id')
                ->on('customers')
                ->onDelete('cascade')
                ->onUpdate('cascade');

        });

        Schema::create('company_personal', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('customer_id')->index();
            $table->string('side_company')->nullable();
            $table->string('sex_company')->nullable();
            $table->string('title_company')->nullable();
            $table->string('name_company')->nullable();
            $table->string('phone_company')->nullable();
            $table->string('inside_company')->nullable();
            $table->longText('email_company')->nullable();
            $table->longText('tel_company_company')->nullable();
            $table->timestamps();
            $table->foreign('customer_id')->references('id')
                ->on('customers')
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
        Schema::dropIfExists('customers');
    }
}
