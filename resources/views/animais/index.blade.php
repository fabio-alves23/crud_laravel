@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h2>Animais</h2>
    <a href="{{ route('animais.create') }}" class="btn btn-primary">Novo Animal</a>
</div>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Raça</th>
            <th>Propriedade</th>
            <th>Idade</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($animais as $animal)
        <tr>
            <td>{{ $animal->id }}</td>
            <td>{{ $animal->nome }}</td>
            <td>{{ $animal->raca->nome ?? '-' }}</td>
            <td>{{ $animal->propriedade->nome ?? '-' }}</td>
            <td>{{ $animal->idade }}</td>
            <td>
                <a href="{{ route('animais.edit', $animal->id) }}" class="btn btn-sm btn-warning">Editar</a>
                <form action="{{ route('animais.destroy', $animal->id) }}" method="POST" style="display:inline-block;">
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
