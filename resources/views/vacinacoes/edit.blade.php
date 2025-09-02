@extends('layouts.app')

@section('content')
<h2>Editar Vacinação</h2>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('vacinacoes.update', $vacinacao->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="animal_id" class="form-label">Animal</label>
        <select name="animal_id" id="animal_id" class="form-select" required>
            @foreach($animais as $animal)
                <option value="{{ $animal->id }}" {{ $vacinacao->animal_id == $animal->id ? 'selected' : '' }}>
                    {{ $animal->nome }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="nome_vacina" class="form-label">Nome da Vacina</label>
        <input 
            type="text" 
            name="nome_vacina" 
            id="nome_vacina" 
            class="form-control" 
            value="{{ old('nome_vacina', $vacinacao->nome_vacina) }}" 
            required
        >
    </div>

    <div class="mb-3">
        <label for="data_aplicacao" class="form-label">Data de Aplicação</label>
        <input 
            type="date" 
            name="data_aplicacao" 
            id="data_aplicacao" 
            class="form-control" 
            value="{{ old('data_aplicacao', $vacinacao->data_aplicacao) }}" 
            required
        >
    </div>

    <button type="submit" class="btn btn-success">Atualizar</button>
    <a href="{{ route('vacinacoes.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
