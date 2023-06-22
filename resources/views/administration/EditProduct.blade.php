@extends("layouts.adm")
@section("title", "adiconar produto")

@section('content')
    <div class="container">
        <form class="mt-6 p-4 border bg-white" action="{{ route('editar.produto') }}" method="post" enctype="multipart/form-data">
            <div class="w-50 m-auto mb-4">
                <h4 class="text-center">Edição de produto</h4>
            </div>
            @csrf
            @if ($errors->any())
                <div>
                    <ul>
                        @foreach ($errors->all() as $erro)
                            <li class="capitalize text-center text-red-500 font-medium p-2 bg-white">* {{ $erro }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session('err'))
                <p class="capitalize text-center text-red-600 p-2 font-medium bg-white">{{ session('err') }}</p>
            @endif

            @foreach ($produto as $item)
                <div class="flex lg:flex-row md:flex-row sm:flex-col w-2/3 m-auto space-x-2">
                    <div class="space-x-1 flex flex-col">
                        <label class="fs-5" for="">Novo nome do produto:</label>
                        <input type="hidden" name="id" value="{{ $item->id }}">
                        <input type="text" name="nome" placeholder="Nome produto..." class="border border-slate-400 p-1 w-56" value="{{ $item->nome }}">
                    </div>
                    <div class="space-x-2 flex flex-col">
                        <label class="fs-5" for="">Novo Valor: </label>
                        <input type="text" placeholder="000.00" name="valor" class="border border-slate-400 p-1 w-24" value="{{ $item->valor }}">
                    </div>
                    <div class="space-x-1 flex flex-col">
                        <label class="fs-5" for="">Valor promo: </label>
                        <input type="text" placeholder="000.00" name="valorpromo" class="border border-slate-400 p-1 w-24" value="{{ $item->valorpromo }}">
                    </div>
                </div>
                <div class="w-2/3 m-auto flex mt-4 space-x-2 flex flex-col">
                    <label class="fs-5" for="">Descrição: </label>
                    <textarea placeholder="fala mais sobre o produto..." name="descricao" class="border border-slate-400 p-1 w-2/3"></textarea>
                </div>
                <div class="w-2/3 m-auto flex mt-4 space-x-2 flex flex-col">
                    <label for="">categoria produto: </label>
                    <select name="categoria_id" id="categoria_id" class="border border-slate-400 p-1 uppercase">
                        @if (isset($categorias))
                            @foreach ($categorias as $category) 
                                <option value="{{ $category->id }}">{{ $category->categoria }}</option>
                            @endforeach    
                        @endif   
                    </select> 
                </div>
                <div class="w-2/3 m-auto flex mt-4 space-x-2 flex flex-col">
                    <label class="fs-5" for="">Produto está em destque ?: </label>
                    <select name="destaque" id="destaque" class="border border-slate-400 p-1 uppercase">
                        <option value="1">sim</option>
                        <option value="0">não</option>
                    </select>
                </div>
            @endforeach
            <div class="w-2/3 m-auto flex mt-4 space-x-2 flex flex-col">
                <label class="fs-5" for="">Nova imagem do produto: </label>
                <input class="form-control" type="file" name="foto" id="foto">
                <input type="submit" value="editar" class="bg-black w-28 text-white py-2 font-medium uppercase mt-6 hover:bg-slate-700 cursor-pointer">
            </div>
        </form>
    </div>
@endsection