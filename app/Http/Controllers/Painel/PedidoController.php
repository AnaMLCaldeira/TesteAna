<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Painel\PedidoFormRequest;
use App\Models\Cliente;
use App\Models\Pedido;
use App\Models\Livro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class PedidoController extends Controller
{
    private $pedido;
    private $cliente;
    private $livro;
    private $totalpage = 5;

    public function __construct(Pedido $pedido, Livro $livro, Cliente $cliente)
    {
        $this->pedido = $pedido;
        $this->livro = $livro;
        $this->cliente = $cliente;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Pedido';
        $pedidos = $this->pedido->paginate($this->totalpage);
        $clientes = Cliente::all()->pluck('nome', 'id'); //recupera dados da tabela clientes
        $livros = Livro::all()->pluck('nome', 'id', 'preco'); //recupera dados da tabela clientes
        return view('site.painel.pedido.index-pedido', compact('pedidos', 'title', 'clientes', 'livros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id = null)
    {
        $title = 'Cadastro de Pedidos';
        //$pedidos = $this->pedido->paginate($this->totalpage);
        $clientes = Cliente::all()->pluck('nome', 'id'); //recupera dados da tabela clientes
        $livros = Livro::all()->pluck('name', 'id'); //recupera dados da tabela clientes

        return view('site.painel.pedido.create-pedido', compact('title', 'clientes', 'livros'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PedidoFormRequest $request)
    {
        $dataForm = $request->all(); //pega todos os dados que vem do formulario
        $insert = $this->pedido->create($dataForm); //faz o cadastro no BD

        if ($insert) {
            $pedido = $this->pedido->orderBy('id', 'desc')->first();
            return view('site.painel.pedido.show-pedido', compact('pedido'));
        } else {
            return redirect()->back('pedido.create-pedido');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show(Pedido $id)
    {
        $pedido = $this->pedido->find($id);
        $livros = Livro::all()->pluck('nome', 'id');
        $items = $pedido->items->all();
        $sub_total = array_pluck($items, 'sub_total');
        $title = "Livro: {$pedido->id}";

        return view('site.painel.pedido.show-pedido', compact('pedido', 'title', 'livros', 'items'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function edit(Pedido $id)
    {
        $title = 'Editar Pedido ' . $id;
        $pedidos = $this->pedido->find($id);
        $clientes = Cliente::all()->pluck('nome', 'id'); //recupera dados da tabela clientes
        $livros = Livro::all()->pluck('nome', 'id'); //recupera dados da tabela clientes

        if ($pedidos) {
            return view('site.painel.pedido.create-pedido', compact('title', 'clientes', 'livros', 'pedidos'));
        } else {
            return view('site.painel.pedido.index-pedido', compact('title', 'clientes', 'livros', 'pedidos'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(PedidoFormRequest $request, Pedido $id)
    {
        $dataForm = $request->all();
        $pedido = $this->pedido->find($id);
        if (isset($pedido)) {
            $update = $pedido->update($dataForm);
        }

        if ($update) {
            return redirect()->route('pedido.show', $id);
        } else {
            return redirect()->route('pedido.edit', $id)->with(['errors' => 'Falha ao Editar']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedido $id)
    {
        $pedido = $this->pedido->find($id);
        $delete = $pedido->delete();

        if ($delete) {
            return redirect()->route('pedido.index');
        } else {
            return redirect()->route('pedido.show', $id)->with(['errors' => 'Falha ao Deletar']);
        }
    }
}
