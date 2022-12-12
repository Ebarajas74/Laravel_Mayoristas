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
        Schema::create('estados', function (Blueprint $table) {
            $table->id();
            $table->string('cestado', 10)->nullable()->default(null);
            $table->string('cpais', 50)->nullable()->default(null);
            $table->string('nombreestado', 100)->nullable()->default(null);
            //$table->foreign('cestado')->references('cestado')->on('codpostales');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estados');
    }
};
