@extends('adminlte::page')
@section('content')
<br>
<section class="content">
    <h1 class = "title-pg">
        <a href="{{route('livros.index')}}"><span class = "glyphicon glyphicon-circle-arrow-left"></span></a>
        Livro: <b>{{$livro->name}}</b>
    </h1>
    <br>
    <p><b>C[odigo]: </b>{{$livro->id}}</p>
    <p><b>Preço: </b>{{$livro->preco}}</p>
    <p><b>Descrição: </b>{{$livro->descricao}}</p>

    <hr>

    @if( isset($errors) && count($errors) > 0 )
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
        <p>{{$error}}</p>
        @endforeach
    </div>
    @endif

    <hr>

    {!! Form::open(['route' => ['livros.destroy', $livro->id], 'method' => 'DELETE']) !!}
    {!! Form::submit("Deletar Livro: $livro->name", ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}

@endsection
