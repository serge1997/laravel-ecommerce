<form class="mt-6 p-4" action="{{ route('store.produto') }}" method="post" enctype="multipart/form-data">
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
    @if (session('success'))
        <p class="capitalize text-center text-green-500 p-2 font-medium bg-white">{{ session('success') }}</p>
    @endif
    @if (session('err'))
        <p class="capitalize text-center text-red-600 p-2 font-medium bg-white">{{ session('err') }}</p>
    @endif
    <div class="flex lg:flex-row md:flex-row sm:flex-col w-2/3 m-auto space-x-2">
        <div class="space-x-1 flex flex-col">
            <label for="">nome:</label>
            <input type="text" name="nome" placeholder="Nome produto..." class="border border-slate-400 p-1 w-56">
        </div>
        <div class="space-x-2 flex flex-col">
            <label for="">Valor venda: </label>
            <input type="text" placeholder="000.00" name="valor" class="border border-slate-400 p-1 w-24">
        </div>
        <div class="space-x-1 flex flex-col">
            <label for="">Valor promo: </label>
            <input type="text" placeholder="000.00" name="valorpromo" class="border border-slate-400 p-1 w-24">
        </div>
    </div>
    <div class="w-2/3 m-auto flex mt-4 space-x-2 flex flex-col">
        <label for="">Descrição: </label>
        <textarea placeholder="fala mais sobre o produto..." name="descricao" class="border border-slate-400 p-1 w-2/3"></textarea>
    </div>
    <div class="w-2/3 m-auto flex mt-4 space-x-2 flex flex-col">
        <label for="">Imagem do produto: </label>
        <input type="file" name="foto" id="foto">
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
        <label for="">Produto está em destque ?: </label>
        <select name="destaque" id="destaque" class="border border-slate-400 p-1 uppercase">
            <option value="1">sim</option>
            <option value="0">não</option>
        </select>
        <input type="submit" value="salvar" class="bg-black w-28 text-white py-2 font-medium uppercase mt-6 hover:bg-slate-700 cursor-pointer">
    </div>
    
</form>