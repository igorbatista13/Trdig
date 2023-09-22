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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            // $table->string('Sobre_mim')->nullable();
            // $table->string('Orgao')->nullable();
            // $table->string('Cargo')->nullable();
            // $table->string('Endereco')->nullable();
            // $table->string('Cidade')->nullable();
            // $table->string('Estado')->nullable();
            // $table->string('CEP')->nullable();
            // $table->string('Telefone')->nullable();
            // $table->string('Facebook')->nullable();
            // $table->string('Instagram')->nullable();
            // $table->string('Linkedin')->nullable();
            // $table->string('Site')->nullable();
            // $table->string('image')->nullable();
            // $table->string('Status')->nullable();


            // $table->unsignedInteger('perfil_id');
            // $table->foreign('perfil_id')->references('id')->on('perfil');
            
           
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
