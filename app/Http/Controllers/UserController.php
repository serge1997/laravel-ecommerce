<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Endereco;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
            'confirmpassword' => ['required', 'min:8'],
            'password' => ['required', 'min:8'],
            'cep' => ['required'],
            'cidade' => ['required'],
            'rua' => ['required'],
            'complemento' => ['required'],
            'estado' => ['required'],
            'numero' => ['required']
            
        ],

        [
            'name.required' => "Nome obrigatorio",
            'celula.required' => "Numero do celular obrigatorio",
            'cpf.required' => "Cpf obrigatorio",
            'email.required' => "E-mail obrigatorio",
            'password.required' => "Senha obrigatorio",
            'password.min' => "Senha invalida, minimo 8 caracteres",
            'confirmpassword' => "Senha invalida, minimo 8 caracteres",
            'confirmpassword.required' => "Confirme a senha para continuar",
            'cep.required' => "Cep obrigatorio",
            'cidade.required' => "Cidade obrigatorio",
            'rua.required' => "Rua obrigatorio",
            'complemento.required' => "Complemento obrigatorio"
        ]);

        if(substr_count($request->input("email"), "@") != 1 || substr_count($request->input("email"), ".") == 0 ){
            return back()->withInput()->with("err", "*Formato do e-mail invalido");
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

            $emailUnique = User::where('email', $user->email)->first();
            $cpfUnique = User::where('cpf', $user->cpf)->first();

            if($emailUnique || $cpfUnique){
                return back()->withInput()->with("err", "*Usuario já está cadastrado no sistema");
            }

            DB::beginTransaction();
            $user->save();
            $endereco->usuario_id = $user->id;
            $endereco->save();
            DB::commit();

            return redirect()->route("user.cadastra")->with("success", "*Cadastro relizado com successo");
        }catch( \Exception $e){
            return redirect()->route("user.cadastra")->with("err", "cadastro não pode ser realizado");
            Log::error("ERRO", ["file" => "UserController.store", "message" => $e->getMessage()]);
        }

        return redirect()->route("user.cadastra");
    }

    public function login(Request $request)
    {

        if($request->isMethod("POST")){
            $credentials = $request->validate([
            'email'=> ['required', 'email'],
            'password'=>['required'],

            ],

            [
            'email.required' => "Informe o seu e-mail",
            'password.required' => "Informe a sua senha",
            ]);

            if(Auth::attempt($credentials)){
                $request->session()->regenerate();
                return redirect()->intended();
            }else{
                return back()->withInput()->with("err", "Usuario ou senha é invalido");
            }

        }
    }

    public function logout()
    {
        Auth::logout();
        return view("logar");
    }
}
