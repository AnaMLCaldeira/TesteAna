<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Models\Pedido;
use Illuminate\Http\Request;
use App\Http\Requests\Painel\ClienteFormRequest;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;

class ClienteController extends Controller
{

    private $cliente;
    private $totalpage = 5;

    public function __construct(Cliente $cliente)
    {
        $this->cliente = $cliente;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Lista de Clientes';
        $clientes = $this->cliente->paginate($this->totalpage);
        // $cliente->data_cadastro = Carbon::parse($cliente->data_cadastro)->format('d-m-Y');
        return view('site.painel.person.index_cliente', compact('title', 'clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Cadastro de Clientes';
        return view('site.painel.person.create_cliente', compact('title','cliente'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClienteFormRequest $request)
    {
        $dataForm = $request->all();
        //dd($dataForm);

        $insert = $this->cliente->create($dataForm);
        //$cliente->data_cadastro = Carbon::parse($cliente->data_cadastro)->format('d-m-Y');

        if ($insert)
            return redirect()->route('cliente.index');
        else
            return redirect()->back('cliente.create_cliente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = $this->cliente->find($id);
        $title = "Cliente: {$cliente->nome}";
        return view('site.painel.person.show', compact('cliente', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = $this->cliente->find($id);
        $title = "Editar Cliente: ($cliente->nome)";
        $nome = "{$cliente->nome}";
        $cpf = "{$cliente->cpf}";
        $data_cadastro ="($cliente->data_cadastro)";
        return view('site.painel.person.create_cliente', compact('cliente', 'title', 'nome', 'data_cadastro', 'cnpj'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(ClienteFormRequest $request, $id)
    {
        $dataForm = $request->all();
        $cliente = $this->cliente->find($id);
        $update = $cliente->update($dataForm);

        if ($update) {
            return redirect()->route('cliente.index');
        } else {
            return redirect()->route('cliente.edit', $id)->with(['errors' => 'Falha ao Editar']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = $this->cliente->find($id);
        $delete = $cliente->delete();

        if ($delete) {
            return redirect()->route('cliente.index');
        } else {
            return redirect()->route('cliente.show', $id)->with(['errors' => 'Falha ao Deletar']);
        }
    }
}
