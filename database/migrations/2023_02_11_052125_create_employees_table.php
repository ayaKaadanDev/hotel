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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
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
            $table->string('arrive_from');
            $table->date('date_of_arrive');
            // $table->date('date_of_depart');
            // ID's photo
            $table->biginteger('phone_number');
            $table->integer('word_hours');
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
        Schema::dropIfExists('employees');
    }
};
