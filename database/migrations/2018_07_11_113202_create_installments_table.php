<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstallmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('installments', function (Blueprint $table) {
           
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('product_name');
            $table->integer('price_before_interest');
            $table->integer('interest');
            $table->integer('price_after_interest');
            $table->integer('price_per_month');
            $table->integer('price_last_month');
            $table->date('start_month');
            $table->integer('month_no');
            $table->date('last_month');
            $table->string('client_name');
            $table->integer('client_mobile');
            $table->longText('description');
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
        Schema::dropIfExists('installments');
    }
}
