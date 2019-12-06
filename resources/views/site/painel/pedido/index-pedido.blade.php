@extends('adminlte::page')
@section('content')

<section class="content">
    <h1 class = "title-pg">Tabela de Pedidos</h1>

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
                    <a href="{{route('pedido.create')}}" class="btn btn-success pull-right h2">
                        <span class = "glyphicon glyphicon-plus"></span> Cadastrar
                    </a>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-bordered" class ="table">
                    <thead class="thead-light">
                        <tr>
                            <th style="width:5px"><b> Código Pedido</th>
                                <th style="width:30px"><b> Cliente </b></th>
                                <th style="width:30px"> Total do Pedido</th>
                                <th style="width:20px"> Observações </th>
                                <th style="width:15%" class="col-md-2 col-xs-2 col-sm-2"> Ações </th>
                            </tr>
                        </thead>
                        <tr>
                            @foreach ($pedidos as $pedido)
                            <td>{{$pedido->id}}</td>
                            <td>{{$pedido->cliente->nome}}</td>
                            <td>{{number_format($pedido->total_pedido, 2)}}</td>
                            <td>{{$pedido->comentario}}</td>
                            <td class = "td-actions text-center">
                                <a href="{{'url'('site/painel/pedido/edit', $pedido->id)}}"  class="btn btn-warning"  data-placement="top" title ="Editar tabela">
                                    Editar
                                </a>
                                <a href="{{'url'('site/painel/pedido', $pedido->id)}}"  class="btn btn-info btn-round light-blue"  data-placement="top" title ="Show Tabela">
                                    Vizualizar
                                </a>

                                    {{ Form::button('Deletar', ['class' => 'btn btn-danger', 'type' => 'submit', 'form'=>$pedido->id, 'data-toggle'=>'tooltip', 'data-placement' =>'top', 'title' =>'Deletar'] ) }}
                                    {{ Form::open(['action'=>['Painel\PedidoController@destroy', $pedido->id],'class'=>'hidden','method'=>'DELETE', 'id'=>$pedido->id ]) }}
                                    {{ Form::close() }}
                                </a>
                                </td>
                        </tr>
                        @endforeach
                    </table>
                    {!! $pedidos->links() !!}
                </div>
            </div>
        </div>
    </section>
    @endsection

