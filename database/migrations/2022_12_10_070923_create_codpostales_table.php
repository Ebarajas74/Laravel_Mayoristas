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
        Schema::create('codpostales', function (Blueprint $table) {
            $table->id();
            $table->string('ccp', 5)->nullable()->default(null);
            $table->string('cestado', 10)->nullable()->default(null);
            $table->string('cmunicipio', 5)->nullable()->default(null);
            $table->string('clocalidad', 5)->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('codpostales');
    }
};
