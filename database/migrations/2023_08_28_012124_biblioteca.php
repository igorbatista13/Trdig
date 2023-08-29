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
        Schema::create('biblioteca', function (Blueprint $table) {
            $table->increments('id');
            // $table->unsignedBigInteger('pesquisa_mercadologica_id');

            $table->string('Nome')->nullable();
            $table->string('Descricao')->nullable();
            $table->string('Tipo')->nullable();
            $table->string('Status')->nullable();
            $table->string('Anexo')->nullable();
            $table->string('Link')->nullable();
           
                               
            $table->timestamps();
            // $table->foreign('pesquisa_mercadologica_id')->references('id')->on('pesquisa_mercadologica')->onDelete('cascade');

        });  
    
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('biblioteca');
    }
};
