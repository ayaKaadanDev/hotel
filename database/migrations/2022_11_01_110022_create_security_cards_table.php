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
        Schema::create('security_cards', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('fathers_name');
            $table->string('mothers_name');
            $table->string('place_of_birth');
            $table->date('date_of_birth');
            $table->string('nationality');
            $table->string('profassion');
            $table->string('domicile');
            $table->biginteger('no_of_identity_or_passport');
            $table->date('date_of_identity_or_passport');
            $table->string('issued_of_identity_or_passport');
            // $table->integer('phone_number');
            $table->string('arrive_from');
            $table->date('date_of_arrive');
            $table->date('date_of_depart');
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
        Schema::dropIfExists('security_cards');
    }
};
