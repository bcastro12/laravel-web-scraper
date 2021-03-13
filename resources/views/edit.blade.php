@extends('layouts.main')

@section('title', 'Editar')

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
	<h1>Editar registro</h1>
	<form action="/carro/{{$carro->id}}" method="POST">
		@csrf
		@method('PUT')
		<div class="form-group">
			<label for="nome_veiculo">Nome do veículo:</label>
			<input type="text" class="form-control" id="nome_veiculo" name="nome_veiculo" placeholder="Nome do veículo" required value="{{$carro->nome_veiculo}}" />
		</div>
		<div class="form-group">
			<label for="link">Link:</label>
			<input type="text" class="form-control" id="link" name="link" placeholder="Link" required value="{{$carro->link}}" />
		</div>
		<div class="form-group">
			<label for="ano">Ano:</label>
			<input type="text" class="form-control" id="ano" name="ano" placeholder="Ano do veículo" required value="{{$carro->ano}}" />
		</div>
		<div class="form-group">
			<label for="combustivel">Combustível:</label>
			<input type="text" class="form-control" id="combustivel" name="combustivel" placeholder="Tipo de combustível" required value="{{$carro->combustivel}}" />
		</div>
		<div class="form-group">
			<label for="portas">Portas:</label>
			<input type="text" class="form-control" id="portas" name="portas" placeholder="Número de portas" required value="{{$carro->portas}}" />
		</div>
		<div class="form-group">
			<label for="quilometragem">Quilometragem:</label>
			<input type="text" class="form-control" id="quilometragem" name="quilometragem" placeholder="Quilometragem" required value="{{$carro->quilometragem}}" />
		</div>
		<div class="form-group">
			<label for="cambio">Câmbio:</label>
			<input type="text" class="form-control" id="cambio" name="cambio" placeholder="Câmbio" required value="{{$carro->cambio}}" />
		</div>
		<div class="form-group">
			<label for="cor">Cor:</label>
			<input type="text" class="form-control" id="cor" name="cor" placeholder="Cor" required value="{{$carro->cor}}" />
		</div>
		<input type="submit" class="btn btn-primary mt-2" value="Editar registro">
		<button class="btn btn-danger mt-2" onclick="event.preventDefault(); window.history.back();">Cancelar</button>
	</form>
</div>

@endsection