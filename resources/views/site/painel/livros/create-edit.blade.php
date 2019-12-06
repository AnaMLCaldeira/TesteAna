@extends('adminlte::page')
@section('content')
<br>
<section class="content">
    <h1 class = "title-pg">
        <a href="{{route('livros.index')}}"><span class = "glyphicon glyphicon-circle-arrow-left"></span></a>
        Gestão Livro: <i>{{$livro->name ?? 'Novo'}}</i>
    </h1>
    <div class="row" style="align:center">
        @if( isset($errors) && count($errors) > 0 )
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
            <p>{{$error}}</p>
            @endforeach
        </div>
        @endif

        @if(@isset($livro))
            {!! Form::model($livro, ['route'=> ['livros.update', $livro->id], 'class' => 'form', 'method' => 'put' ]) !!}
         @else
            {!! Form::open(['route' => 'livros.store', 'class' => 'form']) !!}
        @endif
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">Cadastro De Livro</h3>
                    </div>

                    <div class="box-body">
                        <form role="form">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <label> Nome:</label>
                                        {!! Form::text('nome', null, ['class' => 'form-control', 'placeholder' => 'Nome:']) !!}
                                    </div>
                                    <div class="col-xs-4">
                                        <label> Autor:</label>
                                        {!! Form::text('autor', null, ['class' => 'form-control', 'placeholder' => 'Autor:']) !!}
                                    </div>
                                    <div class="col-xs-4">
                                        <label> Preço:</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">R$</span>
                                            {!! Form::number('preco', null, ['class' => 'form-control', 'step'=>'0.01', 'min'=>'0.01']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Descrição:</label>
                                {!! Form::textarea('descricao', null, ['class' => 'form-control', 'rows'=>'3', 'placeholder' => 'Digite aqui a descrição...']) !!}
                            </div>
                        </form>

                        <div class="pull-right">
                            <a href="{{route('livros.index')}}"  class="btn btn-danger" data-dismiss="modal" aria-label="Close">Cancelar</a>
                            {!! Form::submit('Salvar', ['class' => 'btn btn-success']) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>

            @endsection
