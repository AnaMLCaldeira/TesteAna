@extends('adminlte::page')
@section('content')

<section class="content">
    <h1 class = "title-pg">Tabela de Clientes</h1>

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
                    <a href="{{route('cliente.create')}}" class="btn btn-success pull-right h2">
                        <span class = "glyphicon glyphicon-plus"></span> Cadastrar
                    </a>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-bordered" class ="table">
                    <thead class="thead-light">
                        <tr>
                            <th style="width:5px"><b> Código </b></th>
                            <th style="width:40px"><b> Nome </b></th>
                            <th style="width:40px"><b> CPF </b></th>
                            <th style="width:10px; text-align:center"><b> Data de Cadastro </b></th>
                            <th style="width:40px ; text-align:center"><b> Ações </b></th>
                        </tr>
                    </thead>
                    @foreach ($clientes as $cliente)
                    <tr role="row" class="odd">
                        <td>{{$cliente->id}}</td>
                        <td>{{$cliente->nome}}</td>
                        <td>{{$cliente->cpf}}</td>
                        <td  align="center">{{Carbon\Carbon::parse($cliente->data_cadastro)->format('d/m/Y')}}</td>
                        <td><div class="form-inline" role="group">


                            <a href="{{route('cliente.edit', $cliente->id)}}" class="btn btn-info" data-toggle="" data-placement="top" title ="Editar">
                                Editar
                            </a>
                            <a href="{{route('cliente.show', $cliente->id)}}"  class="btn btn-warning" data-toggle="tooltip" data-placement="top" title ="Vizualizar">
                                Vizualizar
                            </a>

                            <a href="#" >
                                {{ Form::open(['action' => ['Painel\ClienteController@destroy', $cliente->id], 'class'=>'form-inline', 'method' => 'DELETE']) }}
                                {{ Form::button('Deletar', ['class' => 'btn btn-danger', 'type' => 'submit', 'data-toggle'=>'tooltip', 'data-placement' =>'top', 'title' =>'Deletar'] ) }}
                                {!! Form::close() !!}
                            </a>
                            </div>

                        </td>
                    </tr>
                    @endforeach
                </table>
                {!! $clientes->links() !!}
            </div>
        </div>
    </div>
</section>
@endsection

