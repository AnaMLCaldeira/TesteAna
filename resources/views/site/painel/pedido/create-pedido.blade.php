@extends('adminlte::page')
@section('content')
<section class="content">

    <h1 class = "title-pg">
        <a href="{{route('pedido.index')}}"><span class = "glyphicon glyphicon-circle-arrow-left"></span></a>
        Gestão de Pedidos - <i>{{$title ?? 'Novo'}}</i>
    </h1>
    <div class="row" style="align:center">
        @if( isset($errors) && count($errors) > 0 )
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
            <p>{{$error}}</p>
            @endforeach
        </div>
        @endif
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">{{ $title }}</h3>
            </div>

            <div class="box-body">
                @if(isset($pedidos))
                {!! Form::model($pedidos, ['route'=> ['pedido.update', $pedidos->id], 'class' => 'form', 'method' => 'put' ]) !!}
                @else
                {!! Form::open(['route' => 'pedido.store', 'class' => 'form']) !!}
                @endif
                <div class="form-group">
                    <div class="row">
                        <div class="col-xs-5">
                            {!! Form::label('cliente', 'Cliente') !!}
                            {!! Form::select('cliente_id', $clientes, null, ['class' => 'form-control', 'id'=>'clientes']) !!}
                        </div>
                        <div class="col-xs-2">
                            <label>Data do Pedido:</label>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                {{ Form::date('data_pedido', isset($pedidos->data_pedido) ? Carbon\Carbon::parse($pedidos->data_pedido) : Carbon\Carbon::now(),['class' => 'form-control pull-right'])}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Descrição:</label>
                    {!! Form::textarea('comentario', null, ['class' => 'form-control', 'rows'=>'3', 'placeholder' => 'Digite aqui a descrição...']) !!}
                </div>
                <div class="pull-right">
                    <a href="{{route('pedido.index')}}"  class="btn btn-danger" data-dismiss="modal" aria-label="Close">Cancelar</a>
                    {!! Form::submit('Salvar Pedido', ['class' => 'btn btn-success']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</section>
@include('layouts.utilities.modal_excluir_teste', ['modal'=>'delete-modal', 'idForm'=>'modalConfirmDelete', 'message'=>'Você tem certeza que deseja Apagar este Registro!'])
@endsection
