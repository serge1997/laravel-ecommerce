@extends("layouts.main")
@section("title", "Cadastra")

@section("content")
<div class="flex justify-center mt-8 font-bold text-lg text-slate-800">
    <h1>Cria sua conta</h1>
</div>
<div class="p-2 mt-2">
    @if (session('err'))
        <p class="w-1/3 rounded m-auto text-center text-red-600 p-2 bg-red-200">{{ session('err') }}</p>
    @endif
    @if (session('success'))
        <p class="text-center text-green-500 p-2">{{ session('success') }}</p>
    @endif
    <div hidden>
        @if($errors->any())
            {{ implode('', $errors->all()) }}
        @endif
    </div>
</div>
<div class="conatiner-fluid">
    <div class="container">
        <div class="row mb-5">
            <div class="card col-lg-10 col-md-12 m-auto shadow-sm">
                <div class="card-header bg-white">
                    <h4 class="text-capitalize">cadastro</h4>
                    <p class="small-text fw-medium">crie sua conta !</p>
                </div>
                <div class="card-body w-100">
                    <form class="w-100" action="{{ route('store.user') }}" method="post">
                        @csrf
                        <div class="w-100 d-flex justify-content-center align-content-center mb-4">
                            <div class="form-group w-50 px-2">
                                <label class="fs-5" for="">Nome: </label>
                                <input type="text" name="name" id="name" class="form-control mt-2" value="{{ old('name') }}" placeholder="Pedro da Silva">
                                @if($errors->has('name'))
                                    <span class="text-lowercase text-danger p-0">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group w-50 px-2">
                                <label class="fs-5" for="">E-mail: </label>
                                <input class="form-control mt-2" type="text" name="email" value="{{ old('email') }}" placeholder="pedro@servico.com">
                                @if($errors->has('email'))
                                    <span class="text-lowercase text-danger p-0">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="w-100 d-flex justify-content-center align-content-center mb-4">
                            <div class="form-group w-50 px-2">
                                <label for="" class="fs-5">Cpf: </label>
                                <input class="cpf form-control mt-2" type="text" name="cpf" value="{{ old('cpf') }}" placeholder="000.000.000-00">
                                @if($errors->has('cpf'))
                                    <span class="text-lowercase text-danger p-0">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group w-50 px-2">
                                <label class="fs-5" for="">Celula: </label>
                                <input class="form-control mt-2" type="text" name="celula" id="celula" value="{{ old('celula') }}" placeholder="00.00000.0000">
                                @if($errors->has('celula'))
                                    <span class="text-lowercase text-danger p-0">{{ $errors->first('celula') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="w-100 d-flex justify-content-center align-content-center mb-4">
                            <div class="form-group w-100 px-2">
                                <label for="">Estado: </label>
                                <select name="estado" id="estado" class="form-control">
                                    <option value="PR">PR</option>
                                    <option value="SC">SC</option>
                                    <option value="SP">SP</option>
                                    <option value="BA">BA</option>
                                    <option value="RJ">RJ</option>
                                </select>
                            </div>
                        </div>
                        <div class="w-100 d-flex justify-content-center align-content-center mb-4">
                            <div class="form-group w-50 px-2">
                                <label class="fs-5" for="">cidade: </label>
                                <input class="form-control mt-2" type="text" name="cidade" value="{{ old('cidade') }}" id="cidade" placeholder="cidade">
                                @if($errors->has('cidade'))
                                    <span class="text-lowercase text-danger p-0">{{ $errors->first('cidade') }}</span>
                                @endif
                            </div>
                            <div class="form-group w-50 px-2">
                                <label class="fs-5" for="">Cep: </label>
                                <input class="form-control mt-2" type="text" name="cep" id="cep" value="{{ old('cep') }}" placeholder="00.00000.0000">
                                @if($errors->has('cep'))
                                    <span class="text-lowercase text-danger p-0">{{ $errors->first('cep') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="w-100 d-flex justify-content-center align-content-center mb-4">
                            <div class="form-group w-50 px-2">
                                <label class="fs-5" for="">Rua: </label>
                                <input class="form-control mt-2" type="text" name="rua" value="{{ old('rua') }}" id="rua" placeholder="nome da rua">
                                @if($errors->has('rua'))
                                    <span class="text-lowercase text-danger p-0">{{ $errors->first('rua') }}</span>
                                @endif
                            </div>
                            <div class="form-group w-50 px-2">
                                <label class="fs-5" for="">Numero: </label>
                                <input class="form-control mt-2" type="text" name="numero" id="numero" value="{{ old('nuemro') }}" placeholder="Numero da casa">
                                @if($errors->has('numero'))
                                    <span class="text-lowercase text-danger p-0">{{ $errors->first('numero') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="w-100 d-flex justify-content-center align-content-center mb-4">
                            <div class="form-group w-100 px-2">
                                <label for="">Complemento: </label>
                                <input class="form-control mt-2" type="text" name="complemento" value="{{ old('complemento') }}" id="complemento" placeholder="casa 1, apto 1...">
                            </div>
                        </div>
                        <div class="w-100 d-flex justify-content-center align-content-center mb-4">
                            <div class="form-group w-50 px-2">
                                <label class="fs-5" for="">Senha: </label>
                                <input class="form-control mt-2" type="password" name="password" value="{{ old('password') }}" id="rua" placeholder="senha">
                                @if($errors->has('password'))
                                    <span class="text-lowercase text-danger p-0">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="form-group w-50 px-2">
                                <label class="fs-5" for="">Confirm a senha: </label>
                                <input class="form-control mt-2" type="password" name="confirmpassword" id="confirmpassword" value="{{ old('confirmpassword') }}" placeholder="Confirme sua senha">
                                @if($errors->has('confirmpassword'))
                                    <span class="text-lowercase text-danger p-0">{{ $errors->first('confirmpassword') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group w-100 m-auto mt-4">
                            <button type="submit" id="" class="btn-submit w-25 d-flex justify-content-center py-2 m-auto bg-black text-white">
                                Enviar
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" 
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-send">
                                    <line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection