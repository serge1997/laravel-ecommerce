<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>@yield("title")</title>
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<script src="/js/jquery-min-3-6-3.js"></script>

</head>
<body class="bg-gray-100">
   	<!-- Navbar goes here -->
		<nav class="bg-slate-200 shadow-sm">
			<div class="max-w-6xl mx-auto px-4">
				<div class="flex justify-between">
					<div class="flex space-x-7">
						<div>
							<!-- Website Logo -->
							<a href="#" class="flex items-center py-4 px-2">
								<span class="font-semibold text-gray-500 text-lg">MG. STYLE</span>
							</a>
						</div>
						<!-- Primary Navbar items -->
						<div class="hidden md:flex items-center space-x-1 font-semibold text-gray-700">
							<a href="{{ route('inicio') }}" class="py-4 px-2">Inicio</a>
							<a href="{{ route('categoria') }}" class="py-4 px-2 ">Categorias</a>
							<a href="" class="py-4 px-2 ">Minhas compras</a>
							<a href="{{ route('carrinho') }}" class="py-1 px-4 rounded text-gray-600 bg-gray-300">
								<i class="fa-solid fa-cart-shopping"></i>
							</a>
						</div>
					</div>
					<!-- Secondary Navbar items -->
					<div class="flex items-center space-x-3 ">
						<a href="{{ route('logar') }}" class="py-2 px-2 font-medium text-gray-500 hover:bg-sky-500 hover:text-white transition duration-300">Log In</a>
						<a href="{{ route('user.cadastra') }}" class="py-2 px-2 font-medium text-white bg-sky-500 hover:bg-sky-400 transition duration-300">Cadastrar</a>
					</div>
					<!-- Mobile menu button -->
					<div class="md:hidden flex items-center">
						<button class="outline-none mobile-menu-button">
						<svg class=" w-6 h-6 text-gray-500 hover:text-sky-500"
							x-show="!showMenu"
							fill="none"
							stroke-linecap="round"
							stroke-linejoin="round"
							stroke-width="2"
							viewBox="0 0 24 24"
							stroke="currentColor"
						>
							<path d="M4 6h16M4 12h16M4 18h16"></path>
						</svg>
					</button>
					</div>
				</div>
			</div>
			<!-- mobile menu -->
			<div class="hidden mobile-menu">
				<ul class="font-semibold p-4 text-gray-700">
					<li><a href="{{ route('inicio') }}" class="block py-2">Inicio</a></li>
					<li><a href="{{ route('categoria') }}" class="block py-2">Categoria</a></li>
					<li><a href="#contact" class="block py-2">Minhas compras</a></li>
					<a href="{{ route('carrinho')}}" class="py-1 px-4 rounded text-gray-600 bg-gray-300">
						<i class="fa-solid fa-cart-shopping"></i>
					</a>
				</ul>
			</div>
			
		</nav>
    @yield("content")
    
	@yield("js")

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="/js/script.js"></script>
</body>

</html>