@extends("layouts.adm")
@section("title", "adicionar categoria")
<link rel="stylesheet" href="../css/style.css">

@section("content")
<div class="m-auto text-xl p-4 font-bold">
    <div>
        <button class="btn open bg-white border-0">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" 
                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-align-left"><line x1="17" y1="10" x2="3" y2="10"></line><line x1="21" y1="6" x2="3" y2="6">
                </line><line x1="21" y1="14" x2="3" y2="14"></line><line x1="17" y1="18" x2="3" y2="18"></line>
            </svg>
        </button>
    </div>
    <div class="text-center w-100">
        <h3 class="capitalize">Salvar nova categoria</h3>
    </div>
</div>
    <div class="flex flex-row justify-center items-center m-auto">
        <div class="basis-2/3 m-auto uppercase">
            @include("administration.storecategoria")
        </div>
    </div>
@endsection