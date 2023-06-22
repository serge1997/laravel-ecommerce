<h1>E-mail de recuperação de senha: </h1>
<h4>Plataforma de publicação de revista.</h4>
<a class="mb-2 fs-3" href="{{ route('reset.password', $token) }}">Recupere sua senha </a>
<p>{{ $token }}</p>