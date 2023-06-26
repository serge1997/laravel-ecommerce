<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use Illuminate\Support\Facades\DB;
use App\Models\Produto;
use Illuminate\Support\Facades\Log;

class AdministrationController extends Controller
{
    
    public function addProduto()
    {
        $data = [];
        $categorias = Categoria::all();
        $data['categorias'] = $categorias;

        return view("administration.addproduto", $data);
    }

    public function addCategoria()
    {
        return view("administration.addcategoria");
    }

    public function getAllProduct()
    {
        //$data['produtos'] = Produto::all();
        return view("administration.ProductDashboard", 
            [
                "produtos" => Produto::all()
            ]);
    }

    public function updateProduct($id)
    {
        $productId = Produto::find($id);

        $product = Produto::where('id', $id)->get();

        return view('administration.EditProduct', 
            [
                "produto" => $product,
                "categorias" => Categoria::all()
            ]);
    }

    public function update(Request $request)
    {
        


        try {
            
            if($request->hasFile('foto') && $request->file('foto')->isValid()){
                $foto = $request->foto;
                $extension = $foto->extension();
                $fotoname = md5($foto->getClientOriginalName(). strtotime("now")). ".". $extension;
                $foto->move(public_path('img/produtos'), $fotoname);

                $update = DB::table('produtos')->where('id', $request->id)
                ->update([
                    'nome' =>$request->nome,
                    'valor' => $request->valor,
                    'valorpromo' => $request->valorpromo,
                    'descricao' => $request->descricao,
                    'destaque' => $request->destaque,
                    'foto' => $fotoname,
                    'categoria_id' => $request->categoria_id
                ]);
            }
            
            return redirect()->route('produtos.dashboard')
                ->with("success", "Produto alterado com sucesso");
            
        }catch(\Exception $e) {
            return back()->withInput()->with("err", "erro ao alterar o produto, tente novamente".$e->getMessage());
            Log::error("ERRO", ["file" => "AdministrationController.update", "message" => $e->getMessage()]);
        }
    }

    public function deleteProduct($id)
    {
        Produto::where('id', $id)->delete();

        return redirect()->route('produtos.dashboard')
            ->with("err", "Produto excluido com sucesso");
    }
}
