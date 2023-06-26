@extends("layouts.main")
@section("title", "Inicio")

@section("content")
    <div style="background-image: url('/img/bannershop.PNG');" class="overflow-hidden bg-fixed h-96 bg-no-repeat bg-[right_top_-4rem] bg-auto bg-slate-200">
        <div class="flex flex-col p-8 space-y-8 mt-8">
            <div class="uppercase">
                <h3 class="text-lg">
                    verão 2023 
                </h3>
            </div>
            <div class="uppercase lg:text-3xl md:text-3xl sm:text-xl font-bold">
                <h1>
                    nova coleção
                </h1>
            </div>
            <div>
                <button type="button" class="border uppercase bg-black text-white py-2 px-2 hover:text-black hover:bg-slate-200 hover:border-slate-900">
                    comprar agora
                </button>
            </div>
        </div>
    </div>
    <!-- container catalogo -->
    <div class="w-full flex flex-col capitalize p-8">
        <small class="text-center">new</small>
        <h2 class="text-center text-xl font-bold overline decoration-sky-500 decoration-4 mt-2">lista catalogo</h2>
    </div>
    <div class="container p-4 flex lg:flex-row md:flex-col sm:flex-col flex-wrap space-x-8 justify-center">
       @if (isset($categorias))
           @foreach ($categorias as $category)
           <div class="lg:w-1/5 md:w-full bg-white flex flex-col items-center border border-slate-300 rounded">
                <img src="/img/categoria/{{$category->image}}" class="w-52" alt="">
                <div class="flex flex-col text-center mb-20 relative z-10 px-16 p-2 bg-gray-100">
                    <a href="{{ route('categoria', $category->id )}}" class="nav-link text-md relative z-10 uppercase font-bold px-16">
                        {{ $category->categoria }}
                    </a>
                    @if ($category->id == 1)
                        <span class="text-xs font-sm uppercase font-medium">produto : {{ $qtdmoletom }}</span>
                    @elseif($category->id == 2) 
                        <span class="text-xs font-sm uppercase font-medium">produto : {{ $qtdbasket }}</span>
                    @elseif($category->id == 3)
                        <span class="text-xs font-sm uppercase font-medium">produto : {{ $qtdtenis }}</span>
                    @else
                        <span class="text-xs font-sm uppercase font-medium">produto : {{ $qtdmulhere }}</span>
                    @endif
                    
                </div>
            </div>
           @endforeach
       @endif
    </div>
    <div class="flex flex-col p-2 mt-8 bg-gray-100">
        <div>
            <h2 class="text-xl font-bold capitalize text-center">
                produto em destaque
            </h2>
        </div>
        <div>
            <div class="flex flex row justify-center mt-4">
                <svg class="animate-bounce" width="110" height="101" viewBox="0 0 110 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_2_2)">
                <rect width="0" height="0" transform="translate(108.395) rotate(89.4755)" fill="#fff"/>
                <path d="M63.0216 75.1865C59.3145 82.2086 49.2955 82.3167 45.4378 75.3762L28.5398 44.9754C24.8581 38.3517 29.5947 30.1995 37.1724 30.1177L70.3083 29.7601C77.886 29.6784 82.7975 37.7265 79.2596 44.4281L63.0216 75.1865Z" fill="#0ea5e9"/>
                <path d="M64.0216 53.1865C60.3145 60.2086 50.2955 60.3167 46.4378 53.3762L29.5398 22.9754C25.8581 16.3517 30.5947 8.19946 38.1724 8.11769L71.3083 7.76013C78.886 7.67836 83.7975 15.7265 80.2596 22.4281L64.0216 53.1865Z" fill="#6b21a8" fill-opacity="0.9"/>
                </g>
                <defs>
                <clipPath id="clip0_2_2">
                <rect width="100" height="108.4" fill="white" transform="translate(108.395) rotate(89.4755)"/>
                </clipPath>
                </defs>
                </svg>
            </div>
        </div>
    </div>
    <div class="container-fluid flex flex-row flex-wrap justify-center items-center space-x-4 bg-gray-100">
    <livewire:styles />
        <livewire:destaquetemplate />
    <livewire:scripts />
    </div>
    <div class="flex flex-col p-8 mt-4 bg-gray-100">
        <div>
            <h2 class="text-xl font-bold capitalize text-center">
                veja nossa coleção<br>completa
            </h2>
        </div>
        <div>
            <div class="flex flex-row justify-center mt-6">
                <svg class="animate-bounce" width="110" height="101" viewBox="0 0 110 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_2_2)">
                <rect width="0" height="0" transform="translate(108.395) rotate(89.4755)" fill="#fff"/>
                <path d="M63.0216 75.1865C59.3145 82.2086 49.2955 82.3167 45.4378 75.3762L28.5398 44.9754C24.8581 38.3517 29.5947 30.1995 37.1724 30.1177L70.3083 29.7601C77.886 29.6784 82.7975 37.7265 79.2596 44.4281L63.0216 75.1865Z" fill="#0ea5e9"/>
                <path d="M64.0216 53.1865C60.3145 60.2086 50.2955 60.3167 46.4378 53.3762L29.5398 22.9754C25.8581 16.3517 30.5947 8.19946 38.1724 8.11769L71.3083 7.76013C78.886 7.67836 83.7975 15.7265 80.2596 22.4281L64.0216 53.1865Z" fill="#0D5FAA" fill-opacity="0.9"/>
                </g>
                <defs>
                <clipPath id="clip0_2_2">
                <rect width="100" height="108.4" fill="white" transform="translate(108.395) rotate(89.4755)"/>
                </clipPath>
                </defs>
                </svg>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <livewire:styles />
            <livewire:produtocomponent />
        <livewire:scripts />
    </div>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header border-0">
          <h5 class="modal-title" id="exampleModalLabel">Ver o produto</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body show-conteudo">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="py-1 text-white px-4 bg-danger" data-bs-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div>
    
@endsection