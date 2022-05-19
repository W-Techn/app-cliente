<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppDividasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_dividas', function (Blueprint $table) {
            $table->id('id_divida');

            $table->unsignedBigInteger('cliente_id');  // Chave estrangeira do cliente
            $table->string('nome_divida', 80);
            $table->decimal('valor_divida', 15, 3);  // -999999999999.999 até 999999999999.999 (15 casas normais e 3 após a vírgula)
            $table->date('data_divida');
            $table->string('contrato_divida', 80);
            $table->string('credor_divida', 80);
            $table->text('descricao_divida');
            $table->integer('pagamento_efetuado')->default(0);  // Se for 0 ele não pagou; se for 1 já pagou

            $table->timestamps();

            // Criando a chave estrangeira e referenciando ela na tabela de clientes (app_clientes)
            $table->foreign('cliente_id')->references('id')->on('app_clientes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Removendo a chave estrangeira
        Schema::table('app_dividas', function (Blueprint $table) {
            $table->dropForeign('app_dividas_cliente_id_foreign');
        });

        // Removendo a tabela criada
        Schema::dropIfExists('app_dividas');
    }
}
