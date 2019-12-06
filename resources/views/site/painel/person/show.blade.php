@extends('adminlte::page')
@section('content')

<h1 class = "title-pg">
    <a href="{{route('cliente.index')}}"><span class = "glyphicon glyphicon-circle-arrow-left"></span></a>
    Cliente: <b>{{$cliente->nome}}</b>
</h1>

<section class="content">

    <div class="row" style="align:center">
        <div class="box box-danger">
            <div class="box-body">
                <table class="table table-bordered" class ="table">
                    <thead class="thead-light">
                        <tr>
                            <th style="width:5px"><b>Código do Cliente:</th>
                                <th style="width:30px"><b> Nome: </b></th>
                                <th style="width:30px"> CNPJ: </th>
                                <th style="width:20px"> Pedidos: </th>
                                <th style="width:20px"> Data de Cadastro: </th>
                                <th style="width:15px"> Ações </th>
                            </tr>
                        </thead>
                        <tr>
                            <td>{{$cliente->id}}</td>
                            <td>{{$cliente->nome}}</td>
                            <td>{{$cliente->CNPJ}}</td>
                            <td>{{$cliente->nome}}</td>
                            <td>{{Carbon\Carbon::parse($cliente->data_cadastro)->format('d/m/Y')}}</td>
                            <td class = "td-actions text-right" style="width:15%">

                                <a href="#" >
                                    {{ Form::open(['action' => ['Painel\ClienteController@destroy', $cliente->id], 'class'=>'form-inline', 'method' => 'DELETE']) }}
                                    {{ Form::button('<i class="fa fa-trash"></i>', ['class' => 'btn btn-danger', 'type' => 'submit', 'data-toggle'=>'tooltip', 'data-placement' =>'top', 'title' =>'Deletar'] ) }}
                                </a>

                                <a href="{{route('pedido.create', $cliente->nome)}}" class="btn btn-info" data-toggle="" data-placement="top" title ="Ciar Pedido">
                                    <i class="fa fa-pencil"></i>
                                </a>
                            </td>
                        </tr>
                    </table>
                    <hr>
                    <div>
                        {!! Form::open(['route' => ['cliente.destroy', $cliente->id], 'method' => 'DELETE']) !!}
                        {!! Form::submit("Deletar Cliente: $cliente->nome", ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>

            @if( isset($errors) && count($errors) > 0 )
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                <p>{{$error}}</p>
                @endforeach
            </div>
            @endif

        </div>
    </div>
</div>

</section>
@endsection
