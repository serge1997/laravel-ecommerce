@extends('layouts.main')
@section('title', 'historico de compra')

@section('content')

    <div class="w-full">
        <div class="w-11/12 m-auto flex justify-center text-center">
            <div class="w-11/12 mb-6">
                <h3 class="p-4">Historico de compras</h3>
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
                                <a href="#" class="PedidoModal" data-pedido="{{ $pedidos->id }}"  data-bs-toggle="modal" data-bs-target="#exampleModal">
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
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header border-0">
              <h3 class="modal-title" id="exampleModalLabel">Historico de compras</h3>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body show-itens">
              ...
            </div>
            <div class="modal-footer">
              <button type="button" class="py-1 text-white px-4 bg-danger" data-bs-dismiss="modal">Fechar</button>
            </div>
          </div>
        </div>
      </div>
</div>
@endsection