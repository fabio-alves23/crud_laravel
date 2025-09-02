@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
<h2>Lista de Vacinações</h2>
<a href="{{ route('vacinacoes.create') }}" class="btn btn-primary">Nova Vacinação</a>
</div>
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Animal</th>
            <th>Vacina</th>
            <th>Data de Aplicação</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($vacinacoes as $vacinacao)
            <tr>
                <td>{{ $vacinacao->id }}</td>
                <td>{{ $vacinacao->animal->nome ?? '—' }}</td>
                <td>{{ $vacinacao->nome_vacina }}</td>
                <td>{{ \Carbon\Carbon::parse($vacinacao->data_aplicacao)->format('d/m/Y') }}</td>
                <td>
                    <!-- Botão Editar -->
                    <a href="{{ route('vacinacoes.edit', $vacinacao->id) }}" class="btn btn-warning btn-sm">Editar</a>

                    <!-- Botão Excluir -->
                    <form action="{{ route('vacinacoes.destroy', $vacinacao->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('Tem certeza que deseja excluir esta vacinação?')">
                            Excluir
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center">Nenhuma vacinação cadastrada.</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection
