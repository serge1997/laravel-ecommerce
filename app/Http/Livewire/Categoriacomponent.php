<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Http\Request;
use Livewire\Component;

class Categoriacomponent extends Component
{

    public function render($id = null)
    {

        $category = Categoria::all();
        $data = [];

        if($id == null){

            $produtosCat = Produto::all();
        }else{

            $produtosCat = Produto::where("categoria_id", $id)->get();
        }
        
        
        $data['produtos'] = $produtosCat;
        $data['category'] = $category;
        $data['id'] = $id;
        

        return view('livewire.categoriacomponent', $data);
    }

    public function buscar(Request $request)
    {

        $data = [];
        $buscar = $request->buscar;


        if($buscar){

            $produtos = Produto::WHERE([
                ['nome', 'LIKE', '%'.$buscar.'%']
            ])->paginate(4);

            $data['produtos'] = $produtos;

            return view("result", $data);
        }


    }
}
