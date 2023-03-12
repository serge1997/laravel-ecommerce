<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

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
}
