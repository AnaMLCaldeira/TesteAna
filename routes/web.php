<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */
Auth::routes();

//--------------------------------------------------------------------------------

$this->group(['middleware' => ['auth'], 'namespace' => 'Site'], function () {
    $this->get('/home', 'LTEController@index');
});

$this->get('/', 'Site\SiteController@index')->name('home');

//Rotas Pedido
Route::group(['namespace' => 'Painel', 'prefix' => 'site/painel/pedido', 'middleware' => 'auth'], function () {
    Route::get('/index', 'PedidoController@index');
    Route::get('/create', 'PedidoController@create');
    Route::post('/store', 'PedidoController@store');
    Route::put('/update/{id}', 'PedidoController@update');
    Route::delete('/destroy/{id}', 'PedidoController@destroy')->name('tabelaPreco/destroy');;
    Route::get('/edit/{id}', 'PedidoController@edit');
    Route::put('/update/{id}', 'PedidoController@update');
});

$this->group(['namespace' => 'Painel'], function () {
    Route::resource('site/painel/livros', 'LivroController');
    Route::resource('site/painel/cliente', 'ClienteController');

    Route::resource('site/painel/pedido', 'PedidoController');
    Route::resource('site/painel/criarpedido', 'PedidoController');

    Route::post('site/painel/item/teste', 'ItemController@store');
    Route::post('site/painel/item/show', 'ItemController@show');
    Route::get('site/painel/item/{pedido}', 'ItemController@index');
    Route::any('site/painel/item/del/{item}', 'ItemController@destroy');

});
//----------------------------------------------------------------------------------

Auth::routes();
