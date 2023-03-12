<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Endereco;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    
    public function logar(Request $request)
    {

        return view("logar");
    }

    public function cadastra()
    {
        
        return view("cadastra");
    }

    public function store(Request $request)
    {

        $validate = $request->validate([
            'name' => ['required'],
            'celula' => ['required'],
            'cpf' => ['required'],
            'email' => ['required'],
            'confirmpassword' => ['required'],
            'password' => ['required'],
            'cep' => ['required'],
            'cidade' => ['required']
        ],

        [
            'name.required' => "Nome obrigatorio",
            'celula.required' => "Numero celula obrigatorio",
            'cpf.required' => "Cpf obrigatorio",
            'email.required' => "E-mail obrigatorio",
            'password.required' => "Senha obrigatorio",
            'confirmpassword' => "Confirme a senha para continuar",
            'cep' => "Cep obrigatorio",
            "cidade" => "Cidade obrigatorio"
        ]);

        if(substr_count($request->input("email"), "@") != 1 || substr_count($request->input("email"), ".") == 0 ){
            return redirect()->route('user.cadastra')->with("err", "*Formato do e-mail invalido");
        }

        if($request->password != $request->confirmpassword){

            return redirect()->route("user.cadastra")->with("err", "*Senhas entradas não são iguais");
        }
        $values = $request->all();
        $user = new User($values);
        $user->password = bcrypt($user->password);
        $user->confirmpassword = bcrypt($user->confirmpassword);
        $user->cpf = str_replace(".", "",  $user->cpf);
        $user->cpf = str_replace("-", "", $user->cpf);


        $endereco = new Endereco($values);
        
       try{

            $user->save();
            $endereco->usuario_id = $user->id;
            $endereco->save();

            return redirect()->route("user.cadastra")->with("success", "*Cadastro relizado com successo");
        }catch( \Exception $e){
            return redirect()->route("user.cadastra")->with("err", "cadastro não pode ser realizado");
            Log::error("ERRO", ["file" => "UserController.store", "message" => $e->getMessage()]);
        }

        return redirect()->route("user.cadastra");
    }
}
