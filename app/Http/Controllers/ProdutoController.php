<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;



class ProdutoController extends Controller
{
    
    public function index()
    {
        $data = [];

        return view("inicio",[
            'categorias' => Categoria::limit(4)->get(),
            'qtdmoletom' => Produto::WHERE("categoria_id", 3)->count(),
            'qtdbasket' => Produto::where("categoria_id", 4)->count(),
            'qtdmulhere' => Produto::where("categoria_id", 5)->count(),
            "qtdtenis" => Produto::where("categoria_id", 6)->count(),
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

}
