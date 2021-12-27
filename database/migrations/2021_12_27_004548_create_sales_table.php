<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->double('price');
            $table->string('telephone');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('workplace_id');
            $table->boolean('state');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('workplace_id')->references('id')->on('workplaces');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
