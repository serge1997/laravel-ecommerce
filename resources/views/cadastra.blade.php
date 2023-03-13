@extends("layouts.main")
@section("title", "Cadastra")

@section("content")
<div class="flex justify-center mt-4 font-bold text-lg text-slate-800">
    <h1>Cria sua conta</h1>
</div>
<div class="p-2 mt-2">
    @if (session('err'))
        <p class="w-1/3 rounded m-auto text-center text-red-600 p-2 bg-red-200">{{ session('err') }}</p>
    @endif
    @if (session('success'))
        <p class="text-center text-green-500 p-2">{{ session('success') }}</p>
    @endif
    @if ($errors->any())
        <ul class="text-center text-red-600 p-2">
            @foreach ($errors->all() as $err)
                <li>*{{ $err }}</li>
            @endforeach
        </ul>
    @endif
</div>
    <div class="bg-slate-200 w-full mt-8 p-2">
        <div class="p-4 uppercase">
            <form action="{{ route('store.user') }}" method="post" class="w-2/3 m-auto p-2">
                @csrf
                <div class="flex flex-row">
                    <div class="flex basis-1/2 space-x-2">
                        <div class="flex flex-col w-36">
                            <label for="">Nome completo: </label>
                            <label for="" class="mt-4">e-mail: </label>
                        </div>
                        <div class="flex flex-col">
                            <input class="w-64 border border-slate-400 p-1" type="text" name="name" id="name" placeholder="Pedro da Silva">
                            <input class="w-64 border border-slate-400 p-1 mt-2" type="text" name="email" placeholder="pedro@servico.com">
                        </div>
                    </div>
                    <div class="flex basis-1/2 space-x-2">
                        <div class="flex flex-col">
                            <label for="">celular: </label>
                            <label for="" class="mt-4">cpf: </label>
                        </div>
                        <div class="flex flex-col">
                            <input class="w-64 border border-slate-400 p-1" type="text" name="celula" id="celula" placeholder="00.00000.0000">
                            <input class="cpf w-64 border border-slate-400 p-1 mt-2" type="text" name="cpf" placeholder="000.000.000-00">
                        </div>
                    </div>
                </div>
                <div class="flex flex-row">
                    <div class="flex basis-1/2 space-x-2">
                        <div class="flex flex-col w-36">
                            <label for="">Senha: </label>
                            <label for="" class="mt-4">Confirm senha: </label>
                        </div>
                        <div class="flex flex-col">
                            <input class="w-64 border border-slate-400 p-1 mt-2" type="password" name="password" id="password" placeholder="Senha">
                            <input class="w-64 border border-slate-400 p-1 mt-2" type="password" name="confirmpassword" placeholder="Confirm senha">
                        </div>
                    </div>
                    <div class="flex basis-1/2 space-x-2">
                        <div class="flex flex-col">
                            <label for="">cep: </label>
                            <label for="" class="mt-4">numero: </label>
                        </div>
                        <div class="flex flex-col">
                            <input class="cep w-64 border border-slate-400 p-1 mt-2" type="text" name="cep" placeholder="Cep">
                            <input class="w-64 border border-slate-400 p-1 mt-2" type="text" name="numero" id="numero" placeholder="Numero da casa">
                        </div>
                    </div>
                </div>
                <div class="flex flex-row mt-4 space-x-4">
                    <div class="flex basis-1/2 space-x-2">
                        <div class="flex flex-col w-36">
                            <label for="">cidade: </label>
                        </div>
                        <div class="flex flex-col">
                            <input class="w-96 border border-slate-400 p-1" type="text" name="cidade" id="cidade" placeholder="cidade">
                        </div>
                    </div>
                    <div class="flex basis-1/2 space-x-2">
                        <div class="flex flex-col ml-2">
                            <label for="">estado: </label>
                        </div>
                        <div class="flex flex-col">
                            <select name="estado" id="estado" class="w-28 p-1 border border-slate-400">
                                <option value="PR">PR</option>
                                <option value="SC">SC</option>
                                <option value="SP">SP</option>
                                <option value="BA">BA</option>
                                <option value="RJ">RJ</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="flex flex-row mt-4">
                    <div class="flex basis-1/2 space-x-2">
                        <div class="flex flex-col w-36">
                            <label for="">rua: </label>
                        </div>
                        <div class="flex flex-col">
                            <input class="w-64 border border-slate-400 p-1" type="text" name="rua" id="rua" placeholder="nome da rua">
                        </div>
                    </div>
                    <div class="flex basis-1/2 space-x-2">
                        <div class="flex flex-col">
                            <label for="">complemento: </label>      
                        </div>
                        <div class="flex flex-col">
                            <input class="w-64 border border-slate-400 p-1" type="text" name="complemento" id="complemento" placeholder="casa 1, apto 1...">
                        </div>
                    </div>
                </div>
                <div class="flex justify-center mt-4 p-2">
                    <input type="submit" value="enviar" class="py-2 px-4 font-medium cursor-pointer text-white uppercase bg-black">
                </div>
            </form>
        </div>
    </div>

@endsection