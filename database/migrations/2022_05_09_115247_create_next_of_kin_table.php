<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNextOfKinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('next_of_kin', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uuid');
            $table->unsignedBigInteger('user_id');
            $table->string('firstName');
            $table->string('lastName');
            $table->string('nextOfKinAddress');
            $table->string('nextOfKinState');
            $table->string('phoneNumber');
            $table->string('relationship');
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
        Schema::dropIfExists('next_of_kin');
    }
}
