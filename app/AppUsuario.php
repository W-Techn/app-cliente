<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppUsuario extends Model
{
    protected $fillable = [
        'nome', 'email', 'data_nascimento', 'logradouro', 'bairro', 'cidade', 'estado', 'cep', 'telefone_residencial', 'telefone_celular', 'senha', 'nome_login', 'tipo_acesso', 'codigo'
    ];
}
