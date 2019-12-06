<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Pedido;


class Cliente extends Model
{
    protected $dates = ['data_cadastro'];
    protected $fillable = [
        'nome',
        'data_cadastro',
        'cpf'
    ];

    public function Pedidos()//retorna todos os pedidos vinculados ao cliente (1 cliente pode ter varios pedidos)
    {
        return $this->hasMany(Pedido::Class);//relacionameto de 1 p/ muitos
    }
}
