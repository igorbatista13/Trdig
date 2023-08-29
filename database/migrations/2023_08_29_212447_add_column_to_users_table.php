<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Adicione a coluna desejada aqui
            $table->unsignedBigInteger('orgao_id')->nullable();
            $table->foreign('orgao_id')->references('id')->on('orgaos')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Para reverter a migração, remova a coluna
            $table->dropForeign(['orgao_id']);
            $table->dropColumn('orgao_id');
        });
    }
}
