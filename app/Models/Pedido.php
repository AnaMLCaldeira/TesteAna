<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Cliente;
use App\Models\Item;


class Pedido extends Model
{

    protected $dates = ['data_pedido'];
    protected $fillable = [
        'cliente_id',
        'data_pedido',
        'total_pedido',
        'observacao'
    ];

    public function Cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id'); //Muitos pedidos para Um Cliente (muitos para um)
    }

    public function Items()
    {
        return $this->hasMany(Item::class, 'pedido_id'); //Pedido tem 1 item  (one-to-many - 1 para Muitos)
    }
}
