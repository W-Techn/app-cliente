<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_clientes', function (Blueprint $table) {
            $table->id();
            $table->integer('tipo_pessoa');
            $table->string('nome', 50)->nullable();
            $table->string('email', 80)->unique();
            $table->string('telefone', 16)->nullable();
            $table->string('cpf', 14)->unique()->nullable();
            $table->string('logradouro', 30);
            $table->string('cep', 9);
            $table->string('bairro', 50);
            $table->string('cidade', 30);
            $table->string('estado', 20);
            $table->string('razaoSocial', 50)->nullable();
            $table->string('cnpj', 18)->unique()->nullable();
            $table->string('nomeResponsavel', 50)->nullable();
            $table->string('telefoneResponsavel', 16)->nullable();
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
        Schema::dropIfExists('app_clientes');
    }
}
