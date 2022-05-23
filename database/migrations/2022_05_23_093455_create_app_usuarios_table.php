<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app.usuario.create', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('email');
            $table->date('data_nascimento');
            $table->string('logradouro');
            $table->string('bairro');
            $table->string('cidade');
            $table->string('estado');
            $table->string('cep');
            $table->string('telefone_residencial');
            $table->string('telefone_celular');
            $table->string('senha');
            $table->string('nome_login');
            $table->boolean('tipo_acesso');
            $table->string('codigo')->nullable();
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
        Schema::dropIfExists('app_usuarios');
    }
}
