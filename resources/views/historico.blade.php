@extends('layouts.main')
@section('title', 'historico de compra')

@section('content')

    <div class="w-full">
        <div class="w-11/12 m-auto flex justify-center text-center">
            <div class="w-11/12">
                <h1>Historiorico de compras</h1>
            @if (isset($listaPedido))
                <table class="border-collapse border slate-400 w-full">
                    <thead>
                        <tr class="uppercase">
                            <th class="border border-slate-400 p-2 text-slate-600 uppercase font-normal">N pedido</th>
                            <th class="border border-slate-400 p-2 text-slate-600 uppercase font-normal">data</th>
                            <th class="border border-slate-400 p-2 text-slate-600 uppercase font-normal">status</th>
                            <th class="border border-slate-400 p-2 text-slate-600 uppercase font-normal">ação</th>
                        </tr>
                    </thead>
                   @foreach ($listaPedido as $pedidos)
                    <tbody>
                        <tr>
                            <td>{{ $pedidos->id }}</td>
                            <td class="px-4 py-1">{{ date('d/m/Y', strtotime($pedidos->emissao))}}</td>
                            <td class="px-4">{{ $pedidos->status }}</td>
                            <td>
                                <a href="#" class="PedidoModal" data-pedido="{{ $pedidos->id }}">
                                    <i class="mt-2 text-slate-400 fa-regular fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                   @endforeach
                </table>
            @endif
            </div>
        </div>
    </div>
    <div class="fixed z-10 inset-0 invisible overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true" id="interestModal">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">​</span>
                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle md:w-2/3">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex justify-center sm:items-start">
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                <div class="w-full mt-2 show-itens">
                                    
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
</div>
@endsection