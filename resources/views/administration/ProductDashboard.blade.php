@extends("layouts.adm")
@section("title", "adiconar produto")

@section("content")
    <div class="text-xl p-1 font-bold uppercase">
        <div>
            <button class="btn open bg-white border-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" 
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-align-left"><line x1="17" y1="10" x2="3" y2="10"></line><line x1="21" y1="6" x2="3" y2="6">
                    </line><line x1="21" y1="14" x2="3" y2="14"></line><line x1="17" y1="18" x2="3" y2="18"></line>
                </svg>
            </button>
        </div>
        <div class="text-center">
            <h3>Dashboard Produto</h3>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>imagem</th>
                                <th>Nome</th>
                                <th>Valor</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if (isset($produtos))
                            @foreach ($produtos as $produto )
                            <tr>
                                <td><img style="width: 68px" src="/img/produtos/{{$produto->foto}}" alt=""></td>
                                <td>{{ $produto->nome }}</td>
                                <td>{{ $produto->valor }}</td>
                                <td>
                                    <a href="{{ route('apagar.Produto', $produto->id)}}"><i class="fa-solid fa-circle-xmark"></i></a>
                                    <a href="{{ route('updateProduct', $produto->id )}}"><i class="fa-regular fa-pen-to-square"></i></a>
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
