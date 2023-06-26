<div class="flex flex-row flex-wrap justify-center items-center space-x-2 relative bg-gray-100">
    @foreach ($produtos as $produto)
        <div class="basis-2/5">
            <div class="flex mb-4 flex-wrap bg-white border border-slate-300 rounded-md">
                <div class="basis-1/3 overflow-hidden w-72 m-auto">
                    <img class="w-72 flex" src="/img/produtos/{{ $produto->foto }}" alt="">
                </div>
                <div class="basis-1/2 p-4">
                    <div class="flex flex-col">
                        <h3 class="lg:text-xl md:text-md font-medium">{{ $produto->nome }}</h3>
                        <h3 class="text-sm font-medium text-slate-500">{{ $produto->valor }}</h3>
                    </div>
                    <div class="flex items-center space-x-1 mt-6">
                        <span class="border border-slate-200 px-3 bg-white rounded py-2">XS</span>
                        <span class="border border-slate-200 px-4 bg-white rounded py-2">S</span>
                        <span class="border border-slate-200 px-3 bg-white rounded py-2">M</span>
                        <span class="border border-slate-200 px-3 bg-white rounded py-2">XL</span>
                    </div>
                    <div class="flex space-x-4 mt-4">
                        <button class="bg-gray-900 border hover:bg-white hover:text-black hover:border-slate-900 text-white px-4 py-1" type="button">Comprar</button>
                        <a href="{{ route('add.carrinho', $produto->id) }}" class="nav-link border px-4 py-1 bg-white border-slate-400">Adicionar</a>
                        <a href="#" data-id = {{ $produto->id }} class="px-2 openModal rounded bg-gray-200 text-slate-600">
                            <span><i class="mt-2 fa-regular fa-eye"></i></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    {{$produtos->links() }}

    @if (count($produtos) == 0)
        <h6 class="text-danger">Não há dados para sua pesquisa</h6>
    @endif
<div>
