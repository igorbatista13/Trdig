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
        Schema::create('doc_prefeitura', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('n_processo_id');

            $table->string('Oficios_proposta')->nullable();
            $table->string('Oficios_proposta_sit')->nullable();
            $table->string('Oficios_proposta_obs')->nullable();
            
            $table->string('Oficio_emenda')->nullable();
            $table->string('Oficio_emenda_sit')->nullable();
            $table->string('Oficio_emenda_obs')->nullable();

            $table->string('Delcaracao_contrapartida')->nullable();
            $table->string('Delcaracao_contrapartida_sit')->nullable();
            $table->string('Delcaracao_contrapartida_obs')->nullable();

            $table->string('Comprovante_abertura_conta')->nullable();
            $table->string('Comprovante_abertura_conta_sit')->nullable();
            $table->string('Comprovante_abertura_conta_obs')->nullable();

            $table->string('Comprovante_qualif_tecnica')->nullable();
            $table->string('Comprovante_qualif_tecnica_sit')->nullable();
            $table->string('Comprovante_qualif_tecnica_obs')->nullable();

            $table->string('Diploma_nomeacao')->nullable();
            $table->string('Diploma_nomeacao_sit')->nullable();
            $table->string('Diploma_nomeacao_obs')->nullable();

            $table->string('Ata_eleicao')->nullable();
            $table->string('Ata_eleicao_sit')->nullable();
            $table->string('Ata_eleicao_obs')->nullable();

            $table->string('Doc_posse')->nullable();
            $table->string('Doc_posse_sit')->nullable();
            $table->string('Doc_posse_obs')->nullable();
            
         
            
            $table->foreign('n_processo_id')->references('id')->on('n_processo')->onDelete('cascade');
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
        Schema::dropIfExists('doc_prefeitura');
    }
};