@extends("layouts.adm")
@section("title", "Gestão de pedidos")


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
        <h3 class="capitalize">Gestão de pedidos</h3>
    </div>
</div>
<div class="container">
    <div class="row">
        
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>imagem</th>
                            <th>Emissao</th>
                            <th>Cliente</th>
                            <th>Celular</th>
                            <th>E-mail</th>
                            <th>Valor</th>
                            <th>Status</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if (isset($orders))
                        @foreach ($orders as $order )
                        <tr>
                            <td><img style="width: 68px" src="/img/produtos/{{$order->foto}}" alt=""></td>
                            <td>{{ $order->emissao }}</td>
                            <td>{{ $order->name }}</td>
                            <td>{{ $order->celula }}</td>
                            <td>{{ $order->email }} <a class="text-slate-800" href="mailto:{{$order->email}}"><i class="fa-solid fa-envelope"></i></a></td>
                            <td>{{ $order->valorUnitario }}</td>
                            <td>{{ $order->status }}</td>
                            <td>
            
                            </td>
                        </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection