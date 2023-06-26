<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Password;
use Carbon\Carbon;
use Mail;
class ResetPasswordController extends Controller
{
    public function sendEmail()
    {
        return view('auth.Resetemail');
    }

    public function submitLink(Request $request) 
    {
        $request->validate([
            'email' => ['required']
        ],
        
        [
            'email.required' => "E-mail obrigatorio para continuar"
        ]);

        $email = $request->email;

        if (substr_count($email, '@') != 1 || substr_count($email, '.') == 0) {
            return back()->withInput()->with("err", "Formato do e-mail é invalido");
        }

        $checkEmail = User::where('email', $email)->first();

        if(!$checkEmail) {
            return back()->withInput()->with("err", "O e-email informado não está cadastrado no sistema");
        }

        $emailExist = DB::table('password_reset_tokens')
            ->where('email', $email)->first();

        if($emailExist) {
            return back()->withInput()->with("err", "O e-mail de redefinição de senha já foi enviado a esse endereço e-mail");
        }

        $token = Str::random(64);

        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::send('auth.EmailContent', ['token'=> $token], function($message) use ($request){
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return redirect()->route('form.email')
            ->with('success', "O e-mail de redefinição de senha foi enviado com sucesso");

    }

    public function ResetPassword($token)
    {
        return view('auth.ResetPassword', ['token'=> $token]);
    }

    public function submitREsetPassword(Request $request)
    {

        $request->validate([
            'email'=> 'required',
            'token'=> 'required',
            'password' => 'required',
            'confirmpassword' => 'required'
        ],
        [
            'email.required' => "e-mail obrigatorio",
            'password.required' => "senha obrigatorio",
            'confirmpassword' => "confirmação de senha obrigatorio"
        ]);

        $senha = $request->password;
        $confsenha = $request->confirmpassword;

        if($senha != $confsenha){
            return back()->withInput()->with('err', "As senhas devem ser iguais!");
        }

        $checkToken = DB::table('password_reset_tokens')
            ->where('token', $request->token)->first();

        if (!$checkToken) {
            return redirect()->route('form.email')
                ->with('err', "Token invalido");
        }
        $update = DB::table('password_reset_tokens')
            ->where([
                'email'=>$request->email,
                'token'=>$request->token
            ])->first();


        $user = DB::table('users')->where('email', $request->email)
            ->update([
                'password'=> bcrypt($request->password),
                'confirmpassword' => bcrypt($request->confirmpassword)
            ]);

        DB::table('password_reset_tokens')->where(['email'=>$request->email])->delete();

        return redirect()->route('logar')
            ->with('success', "A senha atualizada com sucesso, faça seu login");
    }
    
}
