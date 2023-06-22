@extends("layouts.main")
@section("title", "Logar")

@section("content")

<div class="flex flex-row flex-wrap justify-center items-center p-8 bg-slate-200">
    <div class="w-96 p-8">
      <div class="form-card mt-8 p-2">
          <div class="form">
            <h1 class="text-lg font-medium text-slate-900 text-center">Entra com sua conta</h1>
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
                <p class="w-full rounded-0 m-auto text-center p-2 alert alert-success">{{ session('success') }}</p>
              @endif
            </div>
            <form action="{{ route('login')}}" method="post">
              @csrf
              <div class="input flex flex-col p-2">
                <label class="text-gray-900 fs-5">E-mail:</label>
                <input class="border border-slate-400 w-72 p-2" name="email" type="text" value="{{ old('email') }}" placeholder="usuario@servico.com">
                @if($errors->has('email'))
                  <span class="text-lowercase text-danger p-0">{{ $errors->first('email') }}</span>
                @endif
              </div>
              <div class="input flex flex-col p-2">
                <label class="text-gray-900 fs-5">Senha:</label>
                <input class="border border border-slate-400 w-72 p-2" type="password" name="password" value="{{ old('password') }}" placeholder="senha">
                @if($errors->has('password'))
                  <span class="text-lowercase text-danger p-0">{{ $errors->first('password') }}</span>
                @endif
              </div>
              <div class="input flex flex-col p-2">
                <a class="nav-link text-center" href="{{ route('form.email') }}">Esqueceu sua senha ?</a>
              </div>
              <div class="input flex mt-4 p-2">
                <input class="border w-72 bg-black text-white cursor-pointer hover:bg-white hover:text-black hover:border-slate-900 p-2" type="submit" value="Sign-up">
              </div>
            </form>
          </div>
      </div>
    </div>
    <div class="w-96 p-8 bg-sky-500">
      <img src="/img/logarbanner.PNG" class="w-96" alt="">
    </div>
</div>

@endsection