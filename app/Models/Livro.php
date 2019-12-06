<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Item;


class Livro extends Model
{
    protected $fillable = [
        'nome',
        'descricao',
        'preco',
        'autor'
    ];

    public function Items()
    {
        return $this->belongsToMany(Item::class);  //Muitos para Muitos
    }
}
