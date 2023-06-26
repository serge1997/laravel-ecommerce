<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;



class CategoriaController extends Controller
{
    

    public function store(Request $request)
    {

        $validate = $request->validate([
            'categoria' => ['required'],
        ],
        [
            'categoria.required' => "O nome da categoria é obrigatorio",
        ]);

        $values = $request->all();
        $categoria = new Categoria();
        $categoria ->fill($values);

        if($request->hasFile('image') && $request->file('image')->isValid()){

            $image = $request->image;
            $extension = $image->extension();
            $imagename = md5($image->getClientOriginalName(). strtotime("now")). ".". $extension;
            $image->move(public_path('img/categoria'), $imagename);
            $categoria->image = $imagename;
        }

        try{

            $categoriaUnico = Categoria::WHERE("categoria",$categoria->categoria)->first();

            if($categoriaUnico){
                return redirect()->route('cadastrar.categoria')->with("err", "*erro, Categoria já está cadastrada no sistema");
            }

            DB::beginTransaction();
            $categoria->save();
            DB::commit();

            return redirect()->route('cadastrar.categoria')->with("success", "*Categoria cadastrada com sucesso");

        }catch(\Exception $e){
            Log::error("ERRO", ["file" => "CategoriaController.store", "message" => $e->getMessage()]);
            return redirect()->route('cadastrar.categoria')->with("err", "*Categoria não pode ser cadastrada");
        }
        

        
    }
}
