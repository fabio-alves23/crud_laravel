@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h2>Raças</h2>
    <a href="{{ route('racas.create') }}" class="btn btn-primary">Nova Raça</a>
</div>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif


<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @forelse($racas as $raca)
        <tr>
            <td>{{ $raca->id }}</td>
            <td>{{ $raca->nome }}</td>
            <td>
                <a href="{{ route('racas.edit', $raca->id) }}" class="btn btn-sm btn-warning">Editar</a>
                <form action="{{ route('racas.destroy', $raca->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza?')">Excluir</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="3" class="text-center">Nenhuma raça cadastrada.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
