<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Models\Livro;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\Painel\LivroFormRequest;

class LivroController extends Controller
{
    private $livro;
    private $totalpage = 5;

    public function __construct(Livro $livro)
    {
        $this->livro = $livro;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Livros';

        $livros = $this->livro->paginate($this->totalpage);

        return view('site.painel.livros.index', compact('livros', 'title'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id = null)
    {
        $preco = '00.00';
        $title = 'Cadastro de Livro';
        return view('site.painel.livros.create-edit', compact('title', 'preco'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LivroFormRequest $request)
    {
        $dataForm = $request->all(); //pega todos os dados que vem do formulario
        $insert = $this->livro->create($dataForm); //faz o cadastro no BD

        if ($insert)
            return redirect()->route('livros.index');
        else
            return redirect()->back('livros.create-edit');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Livro  $livro
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $livro = $this->livro->find($id);
        $title = "Livro: {$livro->nome}";
        return view('site.painel.livros.show', compact('livro', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Livro  $livro
     * @return \Illuminate\Http\Response
     */
    public function edit(Livro $id)
    {
        //recupera produto pelo id
        $livro = $this->livro->find($id);
        $title = "Editar Livro: ($livro->nome)";
        //$categorys = ['Eletronicos', 'Moveis', 'Limpeza', 'Banho', 'Chato'];
        $preco = ($livro->preco);

        return view('site.painel.livros.create-edit', compact('title', 'preco', 'livro'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Livro  $livro
     * @return \Illuminate\Http\Response
     */
    public function update(LivroFormRequest $request, $id)
    {
        //recupera todos os dados do fomulario
        $dataForm = $request->all();

        //recupera o item para editar
        $livro = $this->livro->find($id);

        //altera os itens
        $update = $livro->update($dataForm);
        //verifica se realmente editou
        if($update)
            return redirect()->route('livros.index');
        else
         return redirect()->route('livros.edit',$id)->with(['errors'=>'Falha ao Editar']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Livro  $livro
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $livro = $this->livro->find($id);

        $delete = $livro->delete();

        if($delete)
            return redirect()->route('livros.index');
        else
            return redirect()->route('livros.show', $id)->with(['errors' => 'Falha ao Deletar']);
    }
}
