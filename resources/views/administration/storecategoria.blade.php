<form class="mt-6 p-4" action="{{ route('store.categoria') }}" method="post" enctype="multipart/form-data">
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
            <input type="text" name="categoria" id="categoria" placeholder="Nome produto..." class="border border-slate-400 p-1 w-56">
        </div>
    </div>
    <div class="w-2/3 m-auto flex mt-4 space-x-2 flex flex-col">
        <label for="">Imagem da categoria: </label>
        <input type="file" name="image" id="foto">
    </div>
    <div class="w-2/3 m-auto mt-4 space-x-2 flex flex-col">
        <label for="">Descrição: </label>
        <textarea placeholder="fala mais sobre a categoria..." name="descricao" class="border border-slate-400 p-1 w-2/3"></textarea>
        <input type="submit" value="salvar" class="py-2 font-medium uppercase bg-black w-28 text-white p-1 mt-4 hover:bg-slate-700 cursor-pointer">
    </div>
</form>