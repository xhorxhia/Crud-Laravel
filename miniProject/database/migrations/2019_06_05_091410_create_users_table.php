<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->boolean('isAdmin')->default(0);
            $table->string('email')->unique();
            $table->string('dep_id')->nullable();
            $table->string('tel')->default('069');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken(); //i sherben laravelit , ben pjesen remember me dhe ruan ne db vleren e hashuar
            $table->timestamps(); //ruan kur eshte krijuar dhe kur eshte update-uar
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
}
