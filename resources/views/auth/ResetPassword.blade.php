@extends("layouts.main")
@section("title", "Logar")

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-10 col-md-12 m-auto d-flex flex-row justify-content-center">
                <form action="{{ route('nova.senha') }}" class="w-50" method="post">
                    <div>
                        <div hidden>
                          @if($errors->any())
                              {{ implode('', $errors->all()) }}
                          @endif
                        </div>
                        @if (session('err'))
                          <p class="w-full rounded m-auto text-center text-red-600 p-2 bg-red-200">{{ session('err') }}</p>
                        @endif
                        @if (session('success'))
                          <p class="w-full rounded m-auto text-center text-red-600 p-2 bg-green-700">{{ session('success') }}</p>
                        @endif
                      </div>
                    @csrf
                    <div class="form-group">
                        <input type="hidden" name="token" value="{{ $token }}">
                        <label class="fs-5" for="">Digite Seu e-mail: </label>
                        <input type="text" name="email" class="form-control" placeholder="Digite seu e-mail">
                        @if($errors->has('email'))
                            <span class="text-lowercase text-danger p-0">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="w-100">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="fs-5" for="">Senha: </label>
                                    <input type="password" name="password" class="form-control" placeholder="Digite a nova senha">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="fs-5" for="">Confirm Senha: </label>
                                    <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm a nova senha">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-2">
                        <input type="submit" class="bg-black text-white px-4 py-1" value="Redefinir a senha">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection