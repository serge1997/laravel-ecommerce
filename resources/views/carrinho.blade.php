@extends('layouts.main')
@section('title', 'Carrinho')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
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
                            <div class="dropdown">
                              <input class="btn dropdown-toggle text-dark" type="button" data-bs-toggle="dropdown" aria-expanded="false" value="1">
                              <ul class="dropdown-menu hidden dropdown-menu-white">
                                <li><input type="button" class="dropdown-item" value="1"></li>
                                <li><input type="button" class="dropdown-item" value="2"></li>
                                <li><input type="button" class="dropdown-item" value="3"></li>
                                <li><input type="button" class="dropdown-item" value="4"></li>
                                <li><input type="button" class="dropdown-item" value="5"></li>
                                <li><input type="button" class="dropdown-item" value="6"></li>
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
            <div>
                <form action="{{ route('finalizar.pedido') }}" method="post">
                    @csrf
                    <input type="submit" class="px-4 py-1 bg-sky-500 text-white mt-4 cursor-pointer" value="Finalizar compra">
                </form> 
                <a href="{{ route('finalizar.pedido') }}" class="px-4 py-1 bg-sky-500 text-white mt-4">Finalizar compra</a>
            </div>
        @endif
        @if (count($carrinho) == 0)
            <p>Carrinho Vazio</p>
        @endif
    </div>
@endsection
