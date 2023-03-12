@extends("layouts.adm")
@section("title", "adicionar categoria")


@section("content")
    <div class="w-72 m-auto text-xl p-4 font-bold uppercase">
        <h1>Salvar nova Categoria</h1>
    </div>
    <div class="flex flex-row justify-center items-center m-auto">
        <div class="basis-2/3 m-auto uppercase">
            @include("administration.storecategoria")
        </div>
    </div>
@endsection