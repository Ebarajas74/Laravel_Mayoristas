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
        Schema::create('billingsdatas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('User_id')->nullable();
            $table->foreign('User_id')->references('id')->on('users');
            $table->tinyInteger('IqualAddress')->nullable()->default(null);
            $table->string('ContactName', 255)->nullable()->default(null);
            $table->string('Address', 255)->nullable()->default(null);
            $table->integer('PostalCode')->nullable()->default(null);
            $table->string('Neighborhood', 150)->nullable()->default(null);
            $table->string('City', 100)->nullable()->default(null);
            $table->string('State', 100)->nullable()->default(null);
            $table->string('Phone', 10)->nullable()->default(null);
            $table->string('Email', 200)->nullable()->default(null);
            $table->enum('Type', ['Default','Usuario']);
            $table->tinyInteger('Status');
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
        Schema::dropIfExists('billingsdatas');
    }
};
