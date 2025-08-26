@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h2>Vacinações</h2>
    <a href="{{ route('vacinacoes.create') }}" class="btn btn-primary">Nova Vacinação</a>
</div>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Animal</th>
            <th>Nome da Vacina</th>
            <th>Data de Aplicação</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($vacinacoes as $vacinacao)
        <tr>
            <td>{{ $vacinacao->id }}</td>
            <td>{{ $vacinacao->animal->nome ?? '' }}</td>
            <td>{{ $vacinacao->nome_vacina }}</td>
            <td>{{ $vacinacao->data_aplicacao }}</td>
            <td>
                <a href="{{ route('vacinacoes.edit', $vacinacao->id) }}" class="btn btn-sm btn-warning">Editar</a>
                <form action="{{ route('vacinacoes.destroy', $vacinacao->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza?')">Excluir</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
