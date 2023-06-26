<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PedidoController extends Controller
{
    public function indexOrder()
    {
        $data = [];

        $orders = DB::table('itenspedidos')
            ->join('produtos', 'itenspedidos.produto_id', '=', 'produtos.id')
            ->join('pedidos', 'itenspedidos.pedido_id', '=', 'pedidos.id')
            ->join('users', 'pedidos.usuario_id', '=', 'users.id')
            ->get();

        $data['orders'] = $orders;

        return view('pedido.pedido', $data);
    }

}
