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
        Schema::create('estado', function (Blueprint $table) {
            $table->id();
            $table->string('Nome')->nullable();
            $table->string('Sigla')->nullable();
         //   $table->foreignId('cidade_id')->constrained('cidade')->onDelete('cascade');
          //  $table->foreign('cidade_id')->references('id')->on('cidade')->onDelete('cascade');
        //    $table->foreignId('cidade_id')->constrained('cidade')->onDelete('cascade');


             
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
        Schema::dropIfExists('estado');

    }
};