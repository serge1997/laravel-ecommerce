@extends("layouts.main")
<link rel="stylesheet" href="../css/style.css">
    <div class="col-md-2 position-fixed min-vh-100 bg-white z-1 shadow sidebar">
        <div class="d-flex flex-column">
            <div class="sidebar-header mb-4 d-flex justify-content-between p-2">
                <a href="#" class="flex items-center py-4 px-2 nav-link">
                    <span class="font-semibold text-gray-500 text-lg">MG. STYLE</span>
                </a>
                <button id="close" class="btn text-danger border-0"><i class="fa-sharp fa-solid fa-circle-xmark"></i></button>
            </div>
            <div class="sidebar-body d-flex flex-column mt-4 p-4">
                <a class="nav-link mt-2 p-1 fs-5" href="{{ route('cadastrar.produto') }}" class="hover:text-fuchsia-700">
                    <i class="fa-solid fa-shirt text-slate-700"></i>
                    Adicionar produto
                </a>
                <a class="nav-link mt-2 p-1 fs-5" href="{{ route('cadastrar.categoria') }}" class="hover-text-rose-700 hover:text-rose-700">
                    <i class="fa-solid fa-layer-group text-slate-700"></i>
                    Adicionar categoria
                </a>
                <a class="nav-link mt-2 p-1 fs-5" href="{{ route('produtos.dashboard') }}" class="hover:text-fuchsia-700">
                    <i class="fa-solid fa-list text-slate-700"></i>
                    Lista de produtos
                </a>
                <a class="nav-link mt-2 p-1 fs-5" href="#" class="hover:text-rose-700">
                    <i class="fa-solid fa-list text-slate-700"></i>
                    Lista de categorias
                </a>
                <a class="nav-link mt-2 p-1 fs-5" href="{{ route('pedidos') }}" class="hover:text-rose-700">
                    <i class="fa-solid fa-money-bill-trend-up text-slate-700"></i>
                    Pedidos
                </a>
            </div>
        </div>
    </div>
    {{--<div class="flex flex-col justify-center min-h-full z-10 w-56 p-4 space-y-4 fixed bg-slate-100 text-lg">
        <a href="{{ route('cadastrar.produto') }}" class="hover:text-fuchsia-700">
            <i class="fa-solid fa-shirt text-fuchsia-700"></i>
            Adicionar produto
        </a>
        <a href="{{ route('cadastrar.categoria') }}" class="hover-text-rose-700 hover:text-rose-700">
            <i class="fa-solid fa-layer-group text-rose-700"></i>
            Adicionar categoria
        </a>
        <a href="{{ route('produtos.dashboard') }}" class="hover:text-fuchsia-700">
            <i class="fa-solid fa-list text-fuchsia-700"></i>
            Lista produtos
        </a>
        <a href="#" class="hover:text-rose-700">
            <i class="fa-solid fa-list text-rose-700"></i>
            Lista categorias
        </a>
    </div>--}}
