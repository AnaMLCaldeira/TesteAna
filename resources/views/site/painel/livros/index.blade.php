@extends('adminlte::page')
@section('content')

<section class="content">
    <h1 class = "title-pg">Tabela de Livros</h1>

    <div class="row" style="align:center">
        <div class="box box-danger">
            <div class="box-header with-border">
                <div class="col-md-6">
                    <div class="input-group">
                        <input name="data[search]" class="form-control" id="search" type="text" placeholder="Pesquisar Clientes">
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </span>
                    </div>
                </div>
                <div class="pull-right">
                    <a href="{{route('livros.create')}}" class="btn btn-success pull-right h2">
                        <span class = "glyphicon glyphicon-plus"></span> Cadastrar
                    </a>
                </div>
            </div>

            <div class="box-body">
                <table class="table table-bordered" class ="table">
                    <thead class="thead-light">
                        <tr>
                            <th> Código </th>
                            <th> Nome </th>
                            <th> Autor </th>
                            <th> Preço </th>
                            <th> Descrição </th>
                            <th style="width:40px ; text-align:center"> Ações </th>
                        </tr>
                    </thead>
                    @foreach ($livros as $livro)
                    <tr>
                        <td>{{$livro->id}}</td>
                        <td>{{$livro->name}}</td>
                        <td>{{$livro->autor}}</td>
                        <td>{{number_format($livro->preco, 2)}}</td>
                        <td>{{$livro->descricao}}</td>
                        <td class = "td-actions text-center" style="width:15%">

                            <a href="{{route('livros.edit', $livro->id)}}" class="btn btn-info" data-toggle="" data-placement="top" title ="Editar">
                                    Editar
                            </a>
                            <a href = "{{route('livros.show', $livro->id)}}"  class="btn btn-warning" data-toggle="tooltip" data-placement="top" title ="Vizualizar">
                                    Vizualizar
                            </a>
                            <a href="#" >
                                {{ Form::open(['action' => ['Painel\LivroController@destroy', $livro->id], 'class'=>'form-inline', 'method' => 'DELETE']) }}
                                {{ Form::button('Deletar', ['class' => 'btn btn-danger', 'type' => 'submit', 'data-toggle'=>'tooltip', 'data-placement' =>'top', 'title' =>'Deletar'] ) }}
                                {!! Form::close() !!}
                            </a>

                        </td>
                    </tr>
                    @endforeach
                </table>
                {!! $livros->links() !!}
            </div>
        </div>
    </div>
</section>
@include('layouts.utilities.modal_excluir', ['modal'=>'modalConfirmDelete', 'idForm'=>'modalConfirmDelete', 'message'=>'Você tem certeza que deseja Apagar este Registro!'])
@endsection

