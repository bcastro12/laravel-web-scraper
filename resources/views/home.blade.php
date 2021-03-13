@extends('layouts.main')

@section('title', 'Home')

@section('content')

@if(session('msgSuccess'))
<div class="alert alert-success text-center" role="alert">
    {{session('msgSuccess')}}
</div>
@elseif(session('msgError'))
<div class="alert alert-danger text-center" role="alert">
    {{session('msgError')}}
</div>
@elseif(session('msgInfo'))
<div class="alert alert-primary text-center" role="alert">
    {{session('msgInfo')}}
</div>
@endif
<div class="container-fluid">
    <h1>Lista de carros cadastrados</h1>
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Ano</th>
                        <th scope="col">Combustível</th>
                        <th scope="col">Portas</th>
                        <th scope="col">Quilometragem</th>
                        <th scope="col">Câmbio</th>
                        <th scope="col">Cor</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($carros) == 0)
                    <tr>
                        <td colspan="9" class="text-center">Não há carros cadastrados</td>
                    </tr>
                    @endif
                    @foreach($carros as $carro)
                    <tr>
                        <td scope="row">{{ $carro->id }}</td>
                        <td><a href="{{ $carro->link }}" target="_blank">{{$carro->nome_veiculo}}</a></td>
                        <td>{{ $carro->ano }}</td>
                        <td>{{ $carro->combustivel }}</td>
                        <td>{{ $carro->portas }}</td>
                        <td>{{ number_format($carro->quilometragem,0,',','.') }}</td>
                        <td>{{ $carro->cambio }}</td>
                        <td>{{ $carro->cor }}</td>
                        <td class="d-flex">
                            <a href="/carro/{{$carro->id}}/edit" class="btn btn-info btn-sm">Editar</a>
                            <form action="/carro/{{$carro->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm ml-2">Deletar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection