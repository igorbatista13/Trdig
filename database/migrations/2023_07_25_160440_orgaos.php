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
        Schema::create('orgaos', function (Blueprint $table) {
            $table->id();
            $table->string('Nome')->nullable();
            $table->string('Sigla')->nullable();
            $table->string('image');
            $table->string('Endereco');
            $table->string('Cep');
            $table->string('Mapa_Google');
            $table->string('Email');
            $table->string('Horario_funcionamento');
            $table->string('Site');
            $table->string('Outras_info');

            $table->foreignId('cidade_id')->constrained('cidade')->onDelete('cascade');

             
            $table->timestamps();
        });    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orgaos');

    }
};
