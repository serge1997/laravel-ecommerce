<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdministrationController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\Destaquetemplate;
use App\Http\Livewire\Categoriacomponent;
use App\Http\Livewire\Produtocomponent;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Middleware\UserRole;
use App\Http\Controllers\PedidoController;

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

Route::match(['get', 'post'], '/categoria/{id?}', [Categoriacomponent::class, 'render'])
    ->name("categoria");

Route::post('/ver/produto', [ProdutoController::class, 'show'])
    ->name("show");

Route::post('/busca/categoria', [Categoriacomponent::class, 'buscar'])
    ->name("buscar");

Route::match(['get', 'post'], '/logar', [UserController::class, 'logar'])
    ->name('logar')->middleware('guest');

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
    ->name("user.cadastra")->middleware('guest');

Route::match(['get', 'post'], '/usuario/cadastra', [UserController::class, 'store'])
    ->name('store.user')->middleware('guest');

Route::get('/pagar', [ProdutoController::class, 'finalizar'])
    ->name('finalizar.pedido');

Route::match(['get', 'post'], '/historico/compra', [ProdutoController::class, 'historicoCompras'])
    ->name('historico.compra');

Route::match(['get', 'post'], '/historico/itens/pedido', [ProdutoController::class, 'historicoItensPedido'])
    ->name('itens.pedido');

//---- administrador 
Route::match(['get', 'post'], '/administraçao/produto', [AdministrationController::class, 'addProduto'])
    ->name('cadastrar.produto')->middleware(UserRole::class);;

Route::match(['get', 'post'], '/cadastra/produto', [ProdutoController::class, 'store'])
    ->name('store.produto')->middleware(UserRole::class);


Route::match(['get', 'post'], '/administracao/categoria', [AdministrationController::class, 'addCategoria'])
    ->name('cadastrar.categoria')->middleware(UserRole::class);;

Route::match(['get', 'post'], '/cadastra/categoria', [CategoriaController::class, 'store'])
    ->name('store.categoria')->middleware(UserRole::class);

Route::get('administration/dashboard/produtos', [AdministrationController::class, 'getAllProduct'])
    ->name('produtos.dashboard')->middleware(UserRole::class);

Route::get('administration/edit/produto/{id}', [AdministrationController::class, 'updateProduct'])
    ->name('updateProduct')->middleware(UserRole::class);

Route::match(['get', 'post'], 'update/produto', [AdministrationController::class, 'update'])
    ->name('editar.produto')->middleware(UserRole::class);

Route::match(['get', 'post'], 'delete/product/{id}', [AdministrationController::class, 'deleteProduct'])
    ->name('apagar.Produto')->middleware(UserRole::class);

Route::get('admisitarador/pedido', [PedidoController::class, 'indexOrder'])
    ->name('pedidos')->middleware(UserRole::class);

Route::match(['get', 'post'], '/status', [PedidoController::class, 'OrderStatus'])
    ->name('update.status')->middleware(UserRole::class);


//Reset password 

Route::get('/auth/reset', [ResetPasswordController::class, 'sendEmail'])
    ->name('form.email');

Route::match(['get', 'post'], '/send/link', [ResetPasswordController::class, 'submitLink'])
    ->name('SendLink');

Route::get('auth/reset/password/{token}', [ResetPasswordController::class, 'ResetPassword'])
    ->name('reset.password');
    
Route::match(['get', 'post'], 'resete/new/password', [ResetPasswordController::class, 'submitREsetPassword'])
    ->name('nova.senha');



