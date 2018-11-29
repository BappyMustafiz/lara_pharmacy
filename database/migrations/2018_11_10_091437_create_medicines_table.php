<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicines', function (Blueprint $table) {
            $table->increments('id');
            $table->string('medicine_title');
            $table->integer('category_id');
            $table->string('generic_name');
            $table->string('company_name');
            $table->float('purchase_price', 10, 2);
            $table->float('selling_price', 10, 2);
            $table->integer('stored_box');
            $table->integer('quantity');
            $table->string('effects');
            $table->text('expiry_date');
            $table->string('status');
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
        Schema::dropIfExists('medicines');
    }
}
