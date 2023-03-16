<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdministrationController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\Destaquetemplate;
use App\Http\Livewire\Categoriacomponent;
use App\Http\Livewire\Produtocomponent;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::match(['get', 'post'], '/', [ProdutoController::class, 'index'])
    ->name('inicio');

Route::match(['get', 'post'], '/administraçao/produto', [AdministrationController::class, 'addProduto'])
    ->name('cadastrar.produto');

Route::match(['get', 'post'], '/cadastra/produto', [ProdutoController::class, 'store'])
    ->name('store.produto');


Route::match(['get', 'post'], '/administracao/categoria', [AdministrationController::class, 'addCategoria'])
    ->name('cadastrar.categoria');

Route::match(['get', 'post'], '/cadastra/categoria', [CategoriaController::class, 'store'])
    ->name('store.categoria');

Route::match(['get', 'post'], '/categoria/{id?}', [Categoriacomponent::class, 'render'])
    ->name("categoria");

Route::post('/ver/produto', [ProdutoController::class, 'show'])
    ->name("show");

Route::post('/busca/categoria', [Categoriacomponent::class, 'buscar'])
    ->name("buscar");

Route::match(['get', 'post'], '/logar', [UserController::class, 'logar'])
    ->name('logar');
Route::post('/logged', [UserController::class, 'login'])
    ->name('login');

Route::match(['get', 'post'], '/logout', [UserController::class, 'logout'])
    ->name("logout");

Route::match(['get', 'post'], '/carrinho', [ProdutoController::class, 'carrinho'])
    ->name("carrinho");

Route::match(['get', 'post'], '/adicionar/carrinho/{id}', [ProdutoController::class, 'addcarrinho'])
    ->name("add.carrinho");

Route::match(['get', 'post'], 'remover/item/carrinho/{indice}', [ProdutoController::class, 'removeitem'])
    ->name("remove.carrinho");

Route::match(['get', 'post'], '/cadastra', [UserController::class, 'cadastra'])
    ->name("user.cadastra");

Route::match(['get', 'post'], '/usuario/cadastra', [UserController::class, 'store'])
    ->name('store.user');

Route::get('/pagar', [ProdutoController::class, 'finalizar'])
    ->name('fina.pedido');