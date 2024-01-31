<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->integer('reservation_cost');
            $table->integer('order_id');
            $table->integer('reservation_and_orders_cost');
            $table->integer('add_5_percent_form_cost');
            $table->integer('add_5_percent_from_5_percent');
            $table->integer('add_duplicate_of_the_5_percent');
            $table->integer('total_amount');
            $table->integer('room_id');
            $table->softDeletes();
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
        Schema::dropIfExists('invoices');
    }
};
