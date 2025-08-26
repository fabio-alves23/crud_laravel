@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h2>Propriedades</h2>
    <a href="{{ route('propriedades.create') }}" class="btn btn-primary">Nova Propriedade</a>
</div>

<!-- Mensagem de sucesso -->
@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<!-- Tabela de propriedades -->
<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Localização</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @forelse($propriedades as $propriedade)
        <tr>
            <td>{{ $propriedade->id }}</td>
            <td>{{ $propriedade->nome }}</td>
            <td>{{ $propriedade->localizacao }}</td>
            <td>
                <a href="{{ route('propriedades.edit', $propriedade->id) }}" class="btn btn-sm btn-warning">Editar</a>
                <form action="{{ route('propriedades.destroy', $propriedade->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="4" class="text-center">Nenhuma propriedade cadastrada.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
