@extends('layouts.main')

@section('title', 'pagar')

@section('content')
    <div class="mt-8 p-2">
        <div class="m-auto p-2 flex justify-between">
            <div class="w-56 space-y-2">
                <h1 class="text-xl font-medium capitalize">detalhes da fatura:</h1>
                @foreach ($itens as $item)
                    <div class="p-4 bg-white rounded">
                        <p>{{ $item->nome }}</p>
                        <p><span class="font-medium">{{ $item->valorUnitario }}</span> R$ * {{ $item->quantidate }}</p>
                    </div>
                @endforeach
                <div class="p-4 bg-white rounded">
                    <p>Valor Total: {{ $valorfatura }} R$</p>
                </div>
            </div>
            <form action="" class="space-y-4 p-4 w-2/3  bg-white">
                <div class="flex justify-center space-x-4">
                    <div class="flex flex-col">
                        <label class="capitalize" for="">nome</label>
                        <input class="border border-slate-300 w-56 p-1" value="{{ Auth::user()->name }}" type="text" name="name">
                    </div>
                    <div class="flex flex-col">
                        <label class="capitalize" for="">e-mail</label>
                        <input class="border border-slate-300 w-56 p-1" value="{{ Auth::user()->email }}" type="text" name="email">
                    </div>
                </div>
                <div class="flex flex-col items-center space-x-4 w-3/5 m-auto">
                    <label for="" class="capitalize">numero do cartão</label>
                    <input class="border border-slate-300 p-1 w-11/12" type="text" placeholder="0000.0000.0000.0000" name="email">
                </div>
                <div class="flex justify-center space-x-4">
                    <div class="flex flex-col">
                        <label class="uppercase" for="">cvv/cvc</label>
                        <input class="border border-slate-300 w-56 p-1" placeholder="000" type="text" name="name">
                    </div>
                    <div class="flex flex-col">
                        <label class="capitalize" for="">expiração</label>
                        <input class="border border-slate-300 w-56 p-1" placeholder="00/00" type="text" name="email">
                    </div>
                </div>
                <div class="flex justify-center space-x-2 p-2">
                    <img class="flex w-11" src="/img/mastecard.png" alt="">
                    <img class="flex w-11" src="/img/visacard.png" alt="">
                </div>
                <div class="flex justify-center">
                    <input type="submit" class="px-6 capitalize text-white py-2 cursor-pointer bg-sky-500" value="pagar ->{{ $valorfatura }}">
        
                </div>
            </form>
        </div>
    </div>
@endsection