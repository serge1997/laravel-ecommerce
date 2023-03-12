@extends("layouts.main")

    <div class="flex flex-col justify-center min-h-full z-10 w-56 p-4 space-y-4 fixed bg-slate-100 text-lg">
        <a href="{{ route('cadastrar.produto') }}" class="hover:text-fuchsia-700">
            <i class="fa-solid fa-shirt text-fuchsia-700"></i>
            Adicionar produto
        </a>
        <a href="{{ route('cadastrar.categoria') }}" class="hover-text-rose-700 hover:text-rose-700">
            <i class="fa-solid fa-layer-group text-rose-700"></i>
            Adicionar categoria
        </a>
        <a href="" class="hover:text-fuchsia-700">
            <i class="fa-solid fa-list text-fuchsia-700"></i>
            Lista produtos
        </a>
        <a href="" class="hover:text-rose-700">
            <i class="fa-solid fa-list text-rose-700"></i>
            Lista categorias
        </a>
    </div>
