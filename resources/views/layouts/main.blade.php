<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>@yield("title")</title>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<script src="/js/jquery-min-3-6-3.js"></script>
	<link rel="stylesheet" href="css/style.css">

</head>
<body class="bg-gray-100">
   	<!-- Navbar goes here -->
		<nav class="bg-slate-200 shadow-sm">
			<div class="max-w-6xl mx-auto px-4">
				<div class="flex justify-between">
					<div class="flex space-x-7">
						<div>
							<!-- Website Logo -->
							<a href="#" class="flex items-center py-4 px-2 nav-link">
								<span class="font-semibold text-gray-500 text-lg">MG. STYLE</span>
							</a>
						</div>
						<!-- Primary Navbar items -->
						<div class="hidden md:flex items-center space-x-1 font-semibold text-gray-700">
							<a href="{{ route('inicio') }}" class="py-4 px-2 nav-link">Inicio</a>
							<a href="{{ route('categoria') }}" class="py-4 px-2 nav-link">Categorias</a>
							@auth
								@if(Auth::user()->adm != 1)
									<a href="{{ route('historico.compra') }}" class="py-4 px-2 nav-link">Minhas compras</a>
								@else
									<a href="{{ route('cadastrar.produto') }}" class="py-4 px-2 nav-link">Dashboard</a>
								@endif
							@endauth
								
							<a href="{{ route('carrinho') }}" class="py-1 px-4 rounded text-gray-600 bg-gray-300">
								<i class="fa-solid fa-cart-shopping"></i>
							</a>
						</div>
					</div>
					<!-- Secondary Navbar items -->
					<div class="flex items-center space-x-3 ">
						@guest
							<a href="{{ route('logar') }}" class="log py-2 px-2 font-medium text-gray-500 hover:bg-sky-500 hover:text-white transition duration-300">Log In</a>
							<a href="{{ route('user.cadastra') }}" class="log py-2 px-2 font-medium text-white bg-sky-500 hover:bg-sky-400 transition duration-300">Cadastrar</a>
						@endguest
						@auth
							<p><i class="text-blue-500">Seja bem vindo, </i>{{ Auth::user()->name }}</p>
							<a href="{{ route('logout') }}" class="log py-2 px-2 font-medium text-white bg-sky-500 hover:bg-sky-400 transition duration-300">Sair</a>
						@endauth
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
    <div class="container-fluid p-5 border-top mt-4">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<a href="#" class="flex items-center py-4 px-2 nav-link">
						<span class="font-semibold text-gray-500 text-lg">MG. STYLE</span>
					</a>
					<p class="text-secondary p-2">
						Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
						sed do eiusmod tempor incididunt ut labore et dolore magna aliqua
					</p>
				</div>
				<div class="col-md-4 p-4">
					<h6 class="text-uppercase">Newlestter</h6>
					<form action="" method="post">
						<input type="text" class="form-control" placeholder="seu e-mail">
						<input class="mt-2 py-1 px-4 bg-slate-800 text-white" type="submit">
					</form>
				</div>
				<div class="col-md-2 p-4">
					<div class="d-flex justify-content-between">
						<a class="nav-link" id="social-icon" href="">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" 
								fill="none" stroke="#64748b" stroke-width="2" stroke-linecap="round" 
								stroke-linejoin="round" class="feather feather-facebook"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
							</svg>
						</a>
						<a class="nav-link" id="social-icon" href="">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" 
								fill="none" stroke="#64748b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
								class="feather feather-instagram"><rect x="2" y="2" width="20" height="20" rx="5" ry="5">
								</rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
							</svg>
						</a>
						<a class="nav-link" id="social-icon" href="">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" 
								fill="none" stroke="#64748b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
								class="feather feather-youtube"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 
								0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z">
								</path><polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"></polygon>
							</svg>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	@yield("js")

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="/js/script.js"></script>
</body>

</html>