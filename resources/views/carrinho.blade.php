@extends('layouts.main')
@section('title', 'Carrinho')

@section('content')
    <div class="w-full flex flex-col items-center mt-16">
        @if(isset($carrinho) && count($carrinho) > 0)
            <table class="border-collapse border slate-400 w-2/3">
                <thead>
                    <tr>
                        <th class="border border-slate-400 p-2 text-slate-600 uppercase font-normal">image</th>
                        <th class="border border-slate-400 p-2 text-slate-600 uppercase font-normal">nome</th>
                        <th class="border border-slate-400 p-2 text-slate-600 uppercase font-normal">quantidate</th>
                        <th class="border border-slate-400 p-2 text-slate-600 uppercase font-normal">valor</th>
                        <th class="border border-slate-400 p-2 text-slate-600 uppercase font-normal">apagar</th>
                    </tr>
                </thead>
                @php
                    $total = 0;
                @endphp
            @foreach($carrinho as $indice=>$produto)
                <tbody>
                    <tr class="text-center">
                        <td>
                            <img class="flex w-16" src="/img/produtos/{{$produto->foto}}" alt="">
                        </td>
                        <td class="p-2">
                            {{ $produto->nome }}
                        </td>
                        <td>
                            <select name="" id="quantidada" class="w-full p-1 border border-slate-300">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                            </select>
                        </td>
                        <td class="p-2">
                            {{ $produto->valor }}
                        </td>
                        <td>
                            <a href="{{ route('remove.carrinho', ['indice' =>$indice])}}" class="text-red-600 inline-flex">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
                @php
                    $total += $produto->valor;
                @endphp
            @endforeach
                <tfoot class="w-ful">
                    <th class="p-4">
                        Total:
                    </th>
                    <th></th>
                    <th></th>
                    <th class="text-center p-4">
                        {{ $total }}
                    </th>
                </tfoot>
            </table>
            <div>
                <form action="{{ route('fina.pedido') }}" method="post">
                    @csrf
                    <input type="submit" class="px-4 py-1 bg-sky-500 text-white mt-4 cursor-pointer" value="Finalizar compra">
                </form>
            </div>
        @endif
        @if (count($carrinho) == 0)
            <p>Carrinho Vazio</p>
        @endif
    </div>
@endsection