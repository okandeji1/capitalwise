<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentAuthorizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_authorizations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uuid');
            $table->unsignedBigInteger('user_id');
            $table->string('authorizationCode');
            $table->string('bin');
            $table->string('last4');
            $table->string('exp_month');
            $table->string('exp_year');
            $table->string('channel');
            $table->string('card_type');
            $table->string('bank');
            $table->string('country_code');
            $table->string('brand');
            $table->tinyInteger('reusable')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_authorizations');
    }
}
