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
        Schema::table('projeto_conteudo', function (Blueprint $table) {
            $table->string('Inicio_Projeto_Conteudo_sit')->nullable()->change();
            $table->string('Inicio_Projeto_Conteudo_obs')->nullable()->change();
            $table->string('Fim_Projeto_Conteudo_sit')->nullable()->change();
        });
    }

    public function down()
    {
        // Você pode adicionar código de reversão aqui, se necessário
    }
};


