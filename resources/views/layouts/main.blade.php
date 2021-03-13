<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	<!-- Styles -->
	<link rel="stylesheet" href="/css/styles.css">
	<title>@yield('title') - UpLexis Tecnologia</title>
</head>

<body class="d-flex h-100">
	<div class="container-fluid d-flex flex-column h-100 p-0">
		<header class="">
			<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
				<div class="container-fluid ms-4">
					<a class="navbar-brand" href="{{ route('index') }}">
						<img src="https://uplexis.com.br/wp-content/themes/tema/vendor/images/logo.png" alt="">
					</a>
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav me-auto mb-2 mb-lg-0">
							<li class="nav-item">
								<a href="{{ route('index') }}" class="nav-link m-2 menu-item">Lista de carros</a>
							</li>
							<li class="nav-item">
								<a href="{{ route('create') }}" class="nav-link m-2 menu-item nav-active">Inserir Carros</a>
							</li>
							<li class="nav-item">
								<form action="/logout" method="POST">
									@csrf
									<a href="/logout" class="nav-link m-2 menu-item" onclick="event.preventDefault(); this.closest('form').submit();">Sair</a>
								</form>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</header>

		<main class="mb-3 mt-5">
			@yield('content')
		</main>

		<footer class="footer mt-auto p-5">
			<a class="navbar-brand" href="{{ route('index') }}">
				<img src="https://uplexis.com.br/wp-content/themes/tema/vendor/images/logo.png" alt="">
			</a>
		</footer>
	</div>
</body>

</html>