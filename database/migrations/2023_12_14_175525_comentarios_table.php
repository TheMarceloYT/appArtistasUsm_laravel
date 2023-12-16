<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('comentarios', Function(Blueprint $table){
            $table->integer('id')->autoIncrement();
            $table->string('comentario', 300);
            $table->date('create_at');
            $table->integer('imagen_id');
            $table->string('user_fk', 40);

            //foreign keys con cascade
            $table->foreign('imagen_id')->references('id')->on('imagenes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_fk')->references('user')->on('cuentas')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comentarios');
    }
};
