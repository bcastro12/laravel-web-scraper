@extends('layouts.main')

@section('title', 'Inserir')

@section('content')

<div class="container">
	<h1>Inserir Carros</h1>
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<form action="{{ route('store') }}" method="POST">
					@csrf
					<label for="search">Pesquisa:</label>
					<input type="text" class="form-control" name="search" id="search" onchange="change()" placeholder="Insira um termo de pesquisa" />
					<button type="submit" class="btn btn-primary mt-2">Enviar</button>
				</form>
				<br />
				<p>Caso nenhum termo seja especificado, o sistema irá pegar todos os resultados da primeira página do site <a href="https://www.questmultimarcas.com.br/estoque" target="_blank">https://www.questmultimarcas.com.br/estoque</a> e gravar no banco de dados.</p>
				<p>Caso um termo de busca seja informado, o sistema irá acessar a página de busca com o termo e irá gravar todos os resultados da primeira página no banco de dados.</p>
			</div>
		</div>
	</div>
</div>


@endsection