@extends('adminlte::page')
@section('content')

<br>
<section class="content">

    <h1 class = "title-pg">
        <a href="{{route('pedido.index')}}"><span class = "glyphicon glyphicon-circle-arrow-left"></span></a>
        Adicionar Item ao Pedido: <i>{{$pedido ?? 'Novo'}}</i>
    </h1>

    <div class="row" style="align:center">
        @if( isset($errors) && count($errors) > 0 )
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
            <p>{{$error}}</p>
            @endforeach
        </div>
        @endif

        @if(@isset($item))
        {!! Form::model($item, ['route'=> ['item.update', $item->id], 'class' => 'form', 'method' => 'put' ]) !!}
        @else
        {!! Form::open(['url' => 'site/painel/item/teste', 'class' => 'form']) !!}
        @endif
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Adicionar item</h3>
            </div>
            <div class="box-body">
                <form role="form">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xs-6">
                                {!! Form::label('livro', 'Livro') !!}
                                {!!Form::select('livro_id', $livros, null, ['class'=>'form-control','placeholder'=>'-','id'=>'livro_id'])!!}                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    {!! Form::label('quantidade','Quantidade', ['class'=>'control-label']) !!}
                                    {!! Form::number('quantidade', null,['class' => 'form-control', 'placeholder'=>'Quantidade', 'step'=>'1','min'=>'1']) !!}
                                </div>
                            </div>
                            <div class="col-md-1 hidden">
                                {!! Form::label('pedido','nº Pedido', ['class'=>'control-label']) !!}
                                {!! Form::number('pedido_id', $pedido, null,['class' => 'form-control']) !!}
                            </div>
                            <hr>
                        </div>
                    </div>
                    <div class="pull-right">
                        <a href="{{route('pedido.index')}}"  class="btn btn-danger" data-dismiss="modal" aria-label="Close">Cancelar</a>

                        {!! Form::submit('Adicionar', ['class' => 'btn btn-success']) !!}
                        {!! Form::close() !!}
                    </div>
                </form>

            </div>


        </div>
    </div>
</div>

@endsection

