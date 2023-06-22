@extends("layouts.main")
@section("title", "Logar")

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 m-auto">
                <div class="w-50 mt-4">
                    <p class="fs-5">
                        Informe seu e-email para receber o link de
                        redefinição de senha.
                    </p class="fs-5">
                </div>
                <form action="{{ route('SendLink') }}" method="post">
                    @csrf
                    @if (session('err'))
                        <p class="w-full rounded m-auto text-center text-red-600 p-1 bg-red-200">{{ session('err') }}</p>
                    @endif
                    @if (session('success'))
                        <p class="w-full rounded-0 m-auto text-center p-2 alert alert-success">{{ session('success') }}</p>
                    @endif
                    <div hidden>
                        @if($errors->any())
                            {{ implode('', $errors->all()) }}
                        @endif
                      </div>
                    <div class="form-group">
                        <label class="fs-5" for="">Insere seu e-mail: </label>
                        <input type="text" name="email" class="form-control" placeholder="Digite seu e-mail" value="{{ old('email') }}">
                        @if ($errors->has('email'))
                            <span class="text-danger p-2">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="form-group mt-2">
                        <input type="submit" class="bg-black text-white px-4 py-1" value="Receber o link">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection