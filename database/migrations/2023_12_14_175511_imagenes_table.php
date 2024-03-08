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
        Schema::create('imagenes', function(Blueprint $table){
            $table->integer('id')->autoIncrement();
            $table->string('titulo', 30);
            $table->string('descripcion', 100);
            $table->string('imagen', 100);
            $table->integer('likes');
            $table->date('create_at');
            $table->string('user_fk', 40);

            //usar softdelete
            $table->softDeletes();

            //foreign key con cascade
            $table->foreign('user_fk')->references('user')->on('cuentas')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('imagenes');
    }
};
