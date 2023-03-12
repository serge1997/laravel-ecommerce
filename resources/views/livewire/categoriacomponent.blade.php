@extends('layouts.main')
@section("title", "categorias")

@section('content')
<livewire:styles />
    <div>
        <livewire:search /> 
    </div>
    <div class="flex flex-row flex-wrap justify-center items-center space-x-2 relative bg-gray-100 show">
        @if (count($produtos) > 0)
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
                            <a href="{{ route('add.carrinho', $produto->id) }}" class="border px-4 py-1 bg-white border-slate-400">Adicionar</a>
                            <a href="#" data-id = {{ $produto->id }} class="px-2 openModal rounded bg-gray-200 text-slate-600">
                                <span><i class="mt-2 fa-regular fa-eye"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        @else
            <p>Não ha produto</p>
        @endif
    </div>
    <div class="saida">

    </div>
    <div class="fixed z-10 inset-0 invisible overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true" id="interestModal">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">​</span>
                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle md:w-2/3">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex justify-center sm:items-start">
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                <div class="w-full mt-2 show-conteudo">
                                    
                                </div>
                            </div>
                    </div>
                  </div>
                  <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                      <button type="button" class="closeModal bg-red-600 mt-3 w-full inline-flex justify-center border border-gray-300 shadow-sm px-4 py-2 text-base font-medium text-white hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                          Fechar
                      </button>
                  </div>
            </div>
        </div>
    </div>
<livewire:scripts />
@endsection
