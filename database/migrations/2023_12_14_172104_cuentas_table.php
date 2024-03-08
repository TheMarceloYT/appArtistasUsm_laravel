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
        Schema::create('cuentas', function(Blueprint $table){
            $table->string('user', 40);
            $table->string('password', 100);
            $table->string('imagen', 100);
            $table->string('nombre', 50);
            $table->string('apellido', 50);
            $table->string('gmail', 80)->unique();
            $table->date('create_at');
            $table->integer('id_rol');

            //usar softdelete
            $table->softDeletes();

            //primary key
            $table->primary('user');

            //foreign key con cascades
            $table->foreign('id_rol')->references('id')->on('roles')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cuentas');
    }
};
