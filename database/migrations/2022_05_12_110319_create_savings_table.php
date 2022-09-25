<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSavingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('savings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uuid');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('category_id');
            $table->double('amount');
            $table->enum('frequency', ['daily', 'weekly', 'monthly', 'quarterly']);
            $table->enum('period', [30, 60,  90, 180, 360]);
            $table->tinyInteger('is_completed')->default(0);
            $table->tinyInteger('is_autocharge')->default(0);
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
        Schema::dropIfExists('savings');
    }
}
