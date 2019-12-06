@extends('adminlte::page')

@section('title', 'Home - CRUD')

@section('content_header')

@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Sistema CRUD - Laravel</h3>
                <br><hr>
                <p>Progresso ...</p>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 95%;">
                        95%
                    </div>
                </div>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <div class="btn-group">
                        <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-wrench"></i></button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Ações</a></li>
                                <li><a href="#">Anotações</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                            </ul>
                        </div>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body" style="">
                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Configurações</span>
                                    <span class="info-box-number">90<small>%</small></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">E-Mail</span>
                                    <span class="info-box-number">41</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->

                        <!-- fix for small devices only -->
                        <div class="clearfix visible-sm-block"></div>

                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Pedidos</span>
                                    <span class="info-box-number">10</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Clientes</span>
                                    <span class="info-box-number">6</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <br>
                    <div class="row">
                        <!-- .col -->
                        <div class="col-md-6 col-lg-6 col-xlg-4">
                            <div class="card card-body">
                                <div class="row">
                                    <div class="col-md-4 col-lg-3 text-center">
                                        <a href="app-contact-detail.html"><img src="https://scontent-sjc3-1.cdninstagram.com/vp/dd4b861e9cad29025cdae9f82a0e609b/5CE596FC/t51.2885-15/e35/39887330_381369329066667_507481713513857024_n.jpg?_nc_ht=scontent-sjc3-1.cdninstagram.com" alt="user" class="img-circle img-responsive"></a>
                                    </div>
                                    <div class="col-md-8 col-lg-9">
                                        <h3 class="box-title m-b-0">Johnathan Doe</h3> <small>Web Designer</small>
                                        <address>
                                            795 Folsom Ave, Suite 600 San Francisco, CADGE 94107
                                            <br>
                                            <br>
                                            <abbr title="Phone">P:</abbr> (123) 456-7890
                                        </address>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.col -->
                        <!-- .col -->
                        <div class="col-md-6 col-lg-6 col-xlg-4">
                            <div class="card card-body">
                                <div class="row">
                                    <div class="col-md-4 col-lg-3 text-center">
                                        <a href="app-contact-detail.html"><img src="https://scontent-sjc3-1.cdninstagram.com/vp/9a83d044fb5100361c4c6a47c85d05e0/5CE05229/t51.2885-15/e35/36791343_1466444883455971_7705711812003495936_n.jpg?_nc_ht=scontent-sjc3-1.cdninstagram.com" alt="user" class="img-circle img-responsive"></a>
                                    </div>
                                    <div class="col-md-8 col-lg-9">
                                        <h3 class="box-title m-b-0">Johnathan Doe</h3> <small>Web Designer</small>
                                        <address>
                                            795 Folsom Ave, Suite 600 San Francisco, CADGE 94107
                                            <br>
                                            <br>
                                            <abbr title="Phone">P:</abbr> (123) 456-7890
                                        </address>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.col -->
                        <!-- .col -->
                        <div class="col-md-6 col-lg-6 col-xlg-4">
                            <div class="card card-body">
                                <div class="row">
                                    <div class="col-md-4 col-lg-3 text-center">
                                        <a href="app-contact-detail.html"><img src="https://pbs.twimg.com/profile_images/803256205506396160/DEuunPx_.jpg" alt="user" class="img-circle img-responsive"></a>
                                    </div>
                                    <div class="col-md-8 col-lg-9">
                                        <h3 class="box-title m-b-0">Johnathan Doe</h3> <small>Web Designer</small>
                                        <address>
                                            795 Folsom Ave, Suite 600 San Francisco, CADGE 94107
                                            <br>
                                            <br>
                                            <abbr title="Phone">P:</abbr> (123) 456-7890
                                        </address>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.col -->
                        <!-- .col -->
                        <div class="col-md-6 col-lg-6 col-xlg-4">
                            <div class="card card-body">
                                <div class="row">
                                    <div class="col-md-4 col-lg-3 text-center">
                                        <a href="app-contact-detail.html"><img src="https://scontent-sjc3-1.cdninstagram.com/vp/706e49eaf45665b01f10056fd4a7fab8/5CDDD382/t51.2885-15/e35/22710933_1950377681889877_6976730706525290496_n.jpg?_nc_ht=scontent-sjc3-1.cdninstagram.com" alt="user" class="img-circle img-responsive"></a>
                                    </div>
                                    <div class="col-md-8 col-lg-9">
                                        <h3 class="box-title m-b-0">Johnathan Doe</h3> <small>Web Designer</small>
                                        <address>
                                            795 Folsom Ave, Suite 600 San Francisco, CADGE 94107
                                            <br>
                                            <br>
                                            <abbr title="Phone">P:</abbr> (123) 456-7890
                                        </address>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col -->
        </div>
        @stop
