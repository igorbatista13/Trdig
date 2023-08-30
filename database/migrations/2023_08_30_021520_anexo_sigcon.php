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
        Schema::create('anexo_sigcon', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('n_processo_id');
            
            $table->string('anexo1')->nullable();
            $table->string('anexo2')->nullable();
            $table->string('anexo3')->nullable();
            $table->string('anexo4')->nullable();
            $table->string('anexo5')->nullable();
            $table->string('anexo6')->nullable();
            $table->string('anexo7')->nullable();
            $table->string('anexo8')->nullable();
            

            $table->timestamps();
        
            $table->foreign('n_processo_id')->references('id')->on('n_processo')->onDelete('cascade');
        });      }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anexo_sigcon');

    }
};
