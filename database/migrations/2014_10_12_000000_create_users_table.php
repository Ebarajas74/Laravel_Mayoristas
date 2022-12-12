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
            $table->string('name', 200);
            $table->string('lastName', 200)->nullable();
            $table->string('company', 200)->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone', 10)->nullable();
            $table->double('discount', 16,2)->nullable();
            $table->string('businessname', 200)->nullable();
            $table->string('cfdi', 100)->nullable();
            $table->string('rfc', 100)->nullable();
            $table->enum('Type', ['Físico','Moral'])->nullable()->default(null);
            $table->enum('Location', ['Bodega GDL','Bodega CDMX','Tienda'])->nullable()->default(null);
            $table->string('role'); // 'Admistrador', 'Vendedor','Mayorista','Coordinador de Almacen','Encargado de Facturacion'
            $table->tinyInteger('status')->nullable();
            $table->rememberToken();
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
