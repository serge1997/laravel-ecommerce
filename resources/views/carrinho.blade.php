@extends('layouts.main')
@section('title', 'Carrinho')
@section('content')
    <div class="w-full flex flex-col items-center mt-16">
        @if(isset($carrinho) && count($carrinho) > 0)
            <table class="border-collapse border slate-400 w-2/3">
                <thead>
                    <tr>
                        <th class="border border-slate-400 p-2 text-slate-600 uppercase font-normal">imagem</th>
                        <th class="border border-slate-400 p-2 text-slate-600 uppercase font-normal">nome</th>
                        <th class="border border-slate-400 p-2 text-slate-600 uppercase font-normal">quantidade</th>
                        <th class="border border-slate-400 p-2 text-slate-600 uppercase font-normal">valor</th>
                        <th class="border border-slate-400 p-2 text-slate-600 uppercase font-normal">excluir</th>
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
                            <div class="btn-group">
                                <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    1
                                </button>
                                <ul class="dropdown-menu">
                                 <li>
                                    <a class="nav-link text-center" href="">1</a>
                                 </li>
                                 <li>
                                    <a class="nav-link text-center" href="">2</a>
                                 </li>
                                 <li>
                                    <a class="nav-link text-center" href="">3</a>
                                 </li>
                                 <li>
                                    <a class="nav-link text-center" href="">4</a>
                                 </li>
                                </ul>
                            </div>
                        </td>
                        <td class="p-2">
                            <input type="button" value="{{ $produto->valor }}" class="valor">
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
            <div class="mt-4">
                {{--<form action="{{ route('finalizar.pedido') }}" method="post">
                    @csrf
                    <input type="submit" class="px-4 py-1 bg-sky-500 text-white mt-4 cursor-pointer" value="Finalizar compra">
                </form>--}}
                <a href="{{ route('finalizar.pedido') }}" class="px-4 py-1 bg-sky-500 text-white mt-4">Finalizar compra</a>
            </div>
        @endif
        @if (count($carrinho) == 0)
            <p>Carrinho Vazio</p>
        @endif
    </div>
@endsection
