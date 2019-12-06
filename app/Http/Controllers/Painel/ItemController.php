<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Requests\Painel\ItemsFormRequest;
use App\Http\Controllers\Controller;
use App\Models\Pedido;
use App\Models\Livro;
use App\Models\Item;


class ItemController extends Controller
{

    private $item;
    private $totalpage = 5;
    private $livro;
    private $pedido;

    function __construct(item $item, Livro $livro, Pedido $pedido)
    {
        $this->item = $item;
        $this->livro = $livro;
        $this->pedido = $pedido;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($pedido)
    {
        $livro_preco = Livro::all()->pluck('preco','id');//recupera dados da tabela product
        // dd($products_preco);
        $livros = Livro::all()->pluck('name','id');//recupera dados da tabela product
        return view('site.painel.item.create-item', compact('livros','livro_preco'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pedido = Pedido::get()->pluck('id');
        $title = 'Adicionar Livro';
        return view('site.painel.livros.create-edit', compact('title','pedido'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemsFormRequest $request)
    {
        $dataForm = $request->all(); //pega todos os dados que vem do formulario
        $livro_id = $this->livro->where('id', (int)$request->livro_id)->first();
        $valor_unit = $livro_id->preco;
        $sub_total = $valor_unit * (int)$request->quantidade;
        $dataForm['sub_total']= $sub_total;
        $insert = $this->item->create($dataForm); //faz o cadastro no BD

        $items = $this->item->where('pedido_id',(int)$request->pedido_id)->get();
        if (isset($items)){
            $total = $items->sum('sub_total');
        }
        $form['total_pedido']=$total;

        $pedido = $this->pedido->find((int)$request->pedido_id);
        $update = $pedido->update($form);

        if ($insert)
            return redirect()->route('pedido.show', $pedido)->with(['errors'=>'Falha ao Editar']);
        else
            return redirect()->back('pedido.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $id)
    {
        $item = $this->item->find($id);

        return view('site.painel.livros.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $id)
    {
        $item = $this->item->find($id);
        return view('site.painel.livros.create-edit', compact('item'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $id)
    {
        $item = $this->item->find($id);

        //altera os itens
        $update = $item->update($this->Item->sub_total($request->all()));

        //verifica se realmente editou
        if($update)
            return redirect()->route('pedido.show','item atualizado');
        else
            return redirect()->route('pedido.edit',$id)->with(['errors'=>'Falha ao Editar']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $items = $this->item->find($item);
        $pedido = $this->pedido->where('id',(int)$items->pedido_id)->get();

        foreach ( $pedido as  $pedidos) {
            $total = $pedidos->total_pedido - $items->sub_total;
        }

        $pedido = $this->pedido->find((int)$items->pedido_id);
        $ped['total_pedido']  = $total;
        //dd($total, $pedido);
        $update = $pedido->update($ped);

        $delete = $items->delete();

        if($delete)
            return redirect()->route('pedido.show', $items->pedido_id);
        else
            return redirect()->route('pedido.show', $pedido->id)->with(['errors' => 'Falha ao Deletar']);
    }
}
