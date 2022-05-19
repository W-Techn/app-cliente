<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppDivida extends Model
{
    protected $fillable = [
        'nome_divida', 'valor_divida', 'data_divida', 'contrato_divida', 'credor_divida', 'descricao_divida', 'pagamento_efetuado'
    ];
}
