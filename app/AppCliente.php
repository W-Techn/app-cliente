<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppCliente extends Model
{
    protected $fillable = [
        'tipo_pessoa','nome', 'email', 'telefone', 'cpf', 'logradouro', 'cep', 'bairro',
        'cidade', 'estado', 'razaoSocial', 'cnpj', 'nomeResponsavel', 'telefoneResponsavel'
    ];
}
