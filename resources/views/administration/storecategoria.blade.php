<form class="mt-6 p-4 border bg-white" action="{{ route('store.categoria') }}" method="post" enctype="multipart/form-data">
    @csrf
    @if ($errors->any())
        <div class="w-50 m-auto">
            <ul class="text-center">
                @foreach ($errors->all() as $erro)
                    <li class="alert alert-danger lowercase p-0 rounded-0">* {{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('success'))
        <p class="alert alert-success lowercase p-0 rounded-0">{{ session('success') }}</p>
    @endif
    @if (session('err'))
        <p class="capitalize text-center text-red-600 p-2 font-medium bg-white">{{ session('err') }}</p>
    @endif
    <div class="w-50 form-group m-auto">
        <label for="">nome:</label>
        <input type="text" name="categoria" id="categoria" placeholder="Nome produto..." class="form-control rounded-0">
    </div>
    <div class="w-50 form-group mt-4 m-auto">
        <label for="">Imagem da categoria: </label>
        <input class="form-control rounded-0" type="file" name="image" id="foto">
    </div>
    <div class="w-50 form-group mt-4 m-auto">
        <label for="">Descrição: </label>
        <textarea placeholder="fala mais sobre a categoria..." name="descricao" class="form-control rounded-0"></textarea>
        <input type="submit" value="salvar" class="py-2 font-medium uppercase bg-black w-28 text-white p-1 mt-4 hover:bg-slate-700 cursor-pointer">
    </div>
</form>