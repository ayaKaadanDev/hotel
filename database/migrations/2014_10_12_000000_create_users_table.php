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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('last_name');
            // $table->string('fathers_name');
            // $table->string('mothers_name');
            // $table->string('place_of_birth');
            // $table->date('date_of_birth');
            // $table->string('nationality');
            // $table->string('profassion');
            // $table->string('domicile');
            // $table->integer('no_of_identity_or_passport');
            // $table->date('date_of_identity_or_passport');
            // $table->string('issued_of_identity_or_passport');

            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->biginteger('phone_number');
            $table->integer('status')->default(0);
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
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
        Schema::dropIfExists('users');
    }
};
