<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Pedido;
use App\Models\Livro;

class Item extends Model
{
    protected $fillable = [
        'livro_id',
        'pedido_id',
        'quantidade',
        'valor_unit',
        'sub_total'

    ];
    public function Pedido()
    {
        return $this->belongsTo(Pedido::class, 'pedido_id'); //Muitos Itens para Um Pedido
    }

    public function Livro()
    {
        return $this->belongsTo(Livro::class, 'livro_id'); //Muitos itens para Um Produto
    }
}
