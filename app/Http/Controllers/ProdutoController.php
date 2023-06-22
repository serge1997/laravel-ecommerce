<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Models\Pedido;
use DateTime;
use App\Models\ItensPedido;
use Illuminate\Support\Facades\DB;

class ProdutoController extends Controller
{
    
    public function index()
    {
        $data = [];

        return view("inicio",[
            'categorias' => Categoria::limit(4)->get(),
            'qtdmoletom' => Produto::WHERE("categoria_id", 1)->count(),
            'qtdbasket' => Produto::where("categoria_id", 2)->count(),
            'qtdmulhere' => Produto::where("categoria_id", 4)->count(),
            "qtdtenis" => Produto::where("categoria_id", 3)->count(),
        ]);
    }

    public function store(Request $request)
    {

        $validate = $request->validate([
            'nome' => ['required'],
            'valor' => ['required'],
            'foto' => ['required'],
            'categoria_id' => ['required'],
        ],
        [
            'nome.required' => "nome do produto obrigarorio",
            'valor.required' => "valor do produto obrigatorio",
            'foto.required' => "imagem do produto requerido",
            'categoria_id.required' => "escolhe uma opção de categoria",
        ]);

        
        $values = $request->all();
        $produto = new Produto($values);

        if($request->hasFile('foto') && $request->file('foto')->isValid()){

            $foto = $request->foto;
            $extension = $foto->extension();
            $fotoname = md5($foto->getClientOriginalName(). strtotime("now")). ".". $extension;
            $foto->move(public_path('img/produtos'), $fotoname);
            $produto->foto = $fotoname;
        }

        try{

            $produto->save();
            return redirect()->route('cadastrar.produto')->with("success", "Produto cadastrado com sucesso");

        }catch(\Exception $e){
            Log::error("ERRO", ["file" => "ProdutoController.store", "message" => $e->getMessage()]);
            return redirect()->route('cadastrar.produto')->with("err", "Produto não pode ser cadastrado");
        }

        return redirect()->route('cadastrar.produto');
    }

    public function show(Request $request)
    {

        $data = [];
        $produto = $request->idproduto;
        $show = Produto::find($produto);
        $data['show'] = $show;

        return view("layouts.show", $data);

    }

    public function addcarrinho($id, Request $request)
    {

        $produto = Produto::find($id);
        $quantidate = 0;

        if($produto)
        {
            $carrinho = session('cart', []);
            array_push($carrinho, $produto);
            session(['cart' => $carrinho]);
            
            return redirect()->route("categoria");
        }
    }

    public function carrinho()
    {
        $data = [];

        $carrinho = session('cart', []);
        $data['carrinho'] = $carrinho;


        return view("carrinho", $data);
    }

    public function removeitem($indice, Request $request)
    {
        $data = [];

        $carrinho = session('cart', []);

        if(isset($carrinho[$indice])){
            unset($carrinho[$indice]);
        }
        session(['cart' => $carrinho]);

        $data['indice'] = $indice;
        $data['carrinho'] = $carrinho;

        return view("carrinho", $data);

    }

    public function finalizar()
    {
        $data = [];
        $hoje = new DateTime();

        if(Auth::user()){
            $pedido = new Pedido();
            $pedido->usuario_id = Auth::user()->id;
            $pedido->emissao = $hoje->format("Y-m-d H:i:s");
            $pedido->status = 'PENDENTE';

            $pedido->save();

        }else{

            return redirect()->action([UserController::class, 'logar'])
                ->with('err', "*Faz o login para finalizar a compra");
        }

        $produtos = session('cart', []);
        
        foreach($produtos as $produto){
            $itens = new ItensPedido();
            $itens->usuario_id = Auth::user()->id;
            $itens->produto_id = $produto->id;
            $itens->pedido_id = $pedido->id;
            $itens->emissao = $hoje->format("Y-m-d H:i:s");
            $itens->quantidate = 1;
            $itens->valorUnitario = $produto->valor;

            $itens->save();
            
        }

        session()->forget('cart');

        if(Auth::user()){

            $takeUseritens = ItensPedido::where('usuario_id', Auth::user()->id);
            $userItens = DB::table('itenspedidos')
                ->join('produtos', 'itenspedidos.produto_id', '=', 'produtos.id')
                ->where('itenspedidos.usuario_id', Auth::user()->id)
                ->get();

            $valorfatura = ItensPedido::where('usuario_id', Auth::user()->id)
                ->sum('valorUnitario');
        }

    
        return view("pagar", [
            'valorfatura' => $valorfatura,
            'itens' => $userItens
        ]);
        
    }

    public function historicoCompras()
    {
        $data = [];

        $listaPedido = Pedido::where('usuario_id', Auth::user()->id)
            ->get();

        $data['listaPedido'] = $listaPedido;

        return view("historico", $data);
    }

    public function historicoItensPedido(Request $request)
    {
        $data = [];
        $idpedido = $request->idpedido;
        
        $listaItens = DB::table('itenspedidos')
            ->join('produtos', 'itenspedidos.produto_id', '=', 'produtos.id')
            ->where('pedido_id', $idpedido)
            ->get();

        $data['ItensList'] = $listaItens;

        //echo json_encode($data);
        return view('layouts.historicoitens', $data);
    } 
}