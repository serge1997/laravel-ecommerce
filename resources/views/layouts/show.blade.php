<div class="flex flex-row flex-wrap justify-center items-center space-x-2 relative bg-gray-100">
    <div class="basis-full">
        <div class="flex w-full mb-4 bg-white border border-slate-300 rounded-md">
            <div class="basis-full overflow-hidden m-auto">
                <img class="w-80 flex" src="/img/produtos/{{ $show->foto }}" alt="">
            </div>
            <div class="basis-1/2 p-4">
                <div class="flex flex-col">
                    <h3 class="lg:text-xl md:text-md font-medium">{{ $show->nome }}</h3>
                    <h3 class="text-xl font-bold text-slate-500">R${{ $show->valor }}</h3>
                    <h3 class="text-sm font-medium text-slate-500">{{ $show->descricao }}</h3>
                </div>
                <div class="flex items-center space-x-1 mt-6">
                    <span class="border border-slate-200 px-3 bg-white rounded py-2">XS</span>
                    <span class="border border-slate-200 px-4 bg-white rounded py-2">S</span>
                    <span class="border border-slate-200 px-3 bg-white rounded py-2">M</span>
                    <span class="border border-slate-200 px-3 bg-white rounded py-2">XL</span>
                </div>
                <div class="flex space-x-4 mt-4">
                    <button class="bg-gray-900 border hover:bg-white hover:text-black hover:border-slate-900 text-white px-4 py-1" type="button">Comprar</button>
                    <a href="{{route('add.carrinho', $show->id)}}" class="border px-4 py-1 bg-white border-slate-400">Adicionar</a>
                </div>
            </div>
        </div>
</div>