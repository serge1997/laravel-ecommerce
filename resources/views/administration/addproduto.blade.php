@extends("layouts.adm")
@section("title", "adiconar produto")

@section("content")
    <div class="w-72 m-auto text-xl p-4 font-bold uppercase">
        <h1>Salvar novo produto</h1>
    </div>
    <div class="flex flex-row justify-center items-center m-auto">
        <div class="basis-2/3 m-auto uppercase">
            @include("administration.storeproduto")
        </div>
    </div>
@endsection
